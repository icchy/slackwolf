<?php namespace Slackwolf\Game\Roles;

use Slackwolf\Game\Role;

/**
 * Defines the Witch class.
 *
 * @package Slackwolf\Game\Roles
 */
class Witch extends Role
{

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return Role::WITCH;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription() {
        return "村人陣営，夜に蘇生または毒殺するプレイヤーを選べる．一回のゲームにつきそれぞれ一度のみ実行可能．";
    }
}
