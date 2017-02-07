<?php namespace Slackwolf\Game\Roles;

use Slackwolf\Game\Role;

/**
 * Defines thee Tanner class.
 *
 * @package Slackwolf\Game\Roles
 */
class Tanner extends Role
{

    /**
     * {@inheritdoc}
     */
	public function getName() {
		return Role::TANNER;
	}

    /**
     * {@inheritdoc}
     */
	public function getDescription() {
		return "村人と人狼いずれの陣営にも属さない．殺されると勝利．";
	}
}
