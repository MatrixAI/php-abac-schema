<?php

namespace ABACExamples;

use ABACExamples\UserAuthAttributes as A;
use ABACExamples\UserController;
use PhpOption\Some;

class UserAuthPolicy {

  public function allow (A $attributes, ?bool $default = false): array {
    if ($attributes->{A::ACTION_PATH} == Some::create(UserController::TEST_ACCESS)) {
      return [true, 'Allowing test access'];
    }
    return [$default, null];
  }

}
