<?php namespace Slackwolf\Game\Roles;

use Slackwolf\Game\Role;

/**
 * Defines the Seer class.
 *
 * @package Slackwolf\Game\Roles
 */
class Seer extends Role
{

    /**
     * {@inheritdoc}
     */
	public function getName() {
		return Role::SEER;
	}

    /**
     * {@inheritdoc}
     */
	public function getDescription() {
		return "村人陣営，毎晩1人のプレイヤーの役職を見ることができる．結果はBotからDMで知らされる．";
	}
}
