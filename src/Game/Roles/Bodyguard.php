<?php namespace Slackwolf\Game\Roles;

use Slackwolf\Game\Role;

/**
 * Defines the  Bodyguard class.
 *
 * @package Slackwolf\Game\Roles
 */
class Bodyguard extends Role
{

    /**
     * {@inheritdoc}
     */
	public function getName() {
		return Role::BODYGUARD;
	}

    /**
     * {@inheritdoc}
     */
	public function getDescription() {
		return "村人陣営，1人のプレイやーを夜に護衛することができる．ただし2日連続して同じプレイヤーを選ぶことはできない．";
	}
}
