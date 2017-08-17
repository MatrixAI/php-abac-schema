<?php

namespace ABAC;

use ABAC\SchemaException;
use PhpOption\Option;
use PhpOption\Some;
use PhpOption\None;

abstract class AbstractAttributes implements ArrayAccess, Iterator, Countable {

  protected $attributes;

  public function __construct (array $attributes = []) {
    foreach ($attributes as $key => $value) {
      $this->offsetSet($key, $value);
    }
  }

  public function offsetExists ($key): bool {
    if (defined("static::$key")) {
      return isset($this->attributes[$key]);
    } else {
      throw new SchemaException('Cannot check for non-existent key');
    }
  }

  public function offsetGet ($key): Option {
    if (defined("static::$key")) {
      if (isset($this->attributes[constant("static::$key")])) {
        return $this->attributes[constant("static::$key")];
      } else {
        return None::create();
      }
    } else {
      throw new SchemaException('Cannot get non-existent key');
    }
  }

  public function offsetSet ($key, $value): void {
    if (defined("static::$key")) {
      $this->attributes[$key] = Some::create($value);
    } else {
      throw new SchemaException('Cannot set non-existent key');
    }
  }

  public function offsetUnset ($key): void {
    if (defined("static::$key")) {
      unset($this->attributes[$key]);
    } else {
      throw new SchemaException('Cannot unset non-existent key');
    }
  }

  public function rewind (): void {
    reset($this->attributes);
  }

  public function current (): Option {
    return current($this->attributes);
  }

  public function key () {
    return key($this->attributes);
  }

  public function next (): void {
    next($this->attributes);
  }

  public function valid (): bool {
    return key($this->attributes) !== null;
  }

  public function count (): int {
    return count($this->attributes);
  }

}
