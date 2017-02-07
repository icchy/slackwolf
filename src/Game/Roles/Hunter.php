<?php namespace Slackwolf\Game\Roles;

use Slackwolf\Game\Role;

/**
 * Defines the Hunter class.
 *
 * @package Slackwolf\Game\Roles
 */
class Hunter extends Role
{

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return Role::HUNTER;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription() {
        return "村人陣営，自分が殺害された時に道連れにするプレイヤーを1人選べる．";
    }
}
