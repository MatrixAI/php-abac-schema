<?php

namespace ABACExamples;

use ABAC\AbstractAttributes;

final class UserAuthAttributes extends AbstractAttributes {

  const USER_ID = 'user_id';
  protected $user_id;
  protected function user_id (int $p) {
    $this->{__FUNCTION__} = $p;
  }

  const ACTION_ID = 'action_id';
  protected $action_id;
  protected function action_id (int $p) {
    $this->{__FUNCTION__} = $p;
  }

  const RESOURCE_ID = 'resource_id';
  protected $resource_id;
  protected function resource_id (int $p) {
    $this->{__FUNCTION__} = $p;
  }

  const TARGET_LIST = 'target_list';
  protected $target_list;
  protected function target_list (array $p) {
    $this->{__FUNCTION__} = $p;
  }

}
