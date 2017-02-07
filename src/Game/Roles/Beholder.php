<?php namespace Slackwolf\Game\Roles;

use Slackwolf\Game\Role;

/**
 * Defines the Beholder class.
 *
 * @package Slackwolf\Game\Roles
 */
class Beholder extends Role
{

    /**
     * {@inheritdoc}
     */
	public function getName() {
		return Role::BEHOLDER;
	}

    /**
     * {@inheritdoc}
     */
	public function getDescription() {
		return "村人陣営，最初の夜に誰が占い師なのかを知ることができる";
	}
}
