<?php

namespace ABACExamples;

use ABACExamples\UserAuthPolicy;
use ABACExamples\UserAuthAttributes as A;

class UserController {

  protected $auth;

  public function __construct (UserAuthPolicy $auth) {
    $this->auth = $auth;
  }

  const TEST_ACCESS = self::class . '::testAccess';
  public function testAccess () {
    [$access, $reason] = $this->auth->allow(new A([
      A::USER_ID     => 1,
      A::ACTION_PATH => static::TEST_ACCESS,
      A::RESOURCE_ID => 2
    ]));
    if ($access) {
      error_log('Yes! ' . $reason);
    } else {
      error_log('No! ' . $reason);
    }
  }

}
