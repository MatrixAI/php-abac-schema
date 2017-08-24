<?php

namespace ABACExamples;

use ABAC\AbstractAttributes;

final class UserAuthAttributes extends AbstractAttributes {

  const USER_ID = 'user_id';
  protected $user_id;
  protected function user_id (int $p) {
    $this->{__FUNCTION__} = $p;
  }

  const ACTION_PATH = 'action_path';
  protected $action_path;
  protected function action_path (string $p) {
    $this->{__FUNCTION__} = $p;
  }

  const RESOURCE_ID = 'resource_id';
  protected $resource_id;
  protected function resource_id (int $p) {
    $this->{__FUNCTION__} = $p;
  }

}
