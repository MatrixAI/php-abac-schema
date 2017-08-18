<?php

namespace ABAC;

use PhpOption\Option;
use PhpOption\Some;
use PhpOption\None;

abstract class AbstractAttributes {

  public function __construct (array $attributes = []) {
    foreach ($attributes as $key => $value) {
      $this->$key($value);
    }
  }

  public function __get ($key): Option {
    if (isset($this->$key)) {
      return Some::create($this->$key);
    } else {
      return None::create();
    }
  }

}
