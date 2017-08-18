<?php

namespace ABACExamples;

use ABACExamples\UserAuthAttributes;
use Trismegiste\Prolog\PrologContext;

class UserAuthPolicy {

  protected $wam;

  public function __construct (PrologContext $wam) {
    $this->wam = $wam;
  }

  public function allow (AuthAttributes $attributes, ?bool $default = false): array {

    // switch ($default) {
    // case true;
    //   $default = 'true';
    // case false:
    //   $default = 'false';
    // case null:
    //   $default = 'null';
    // }
    // $this->wam->loadProlog('./auth.pro');
    // $solution = $this->wam->runQuery("solve([{$attributes[AuthAttributes::USER_ID]}], $default).");

    return [$default, null];

  }

}
