<?php namespace Slackwolf\Game;

use Slackwolf\Game\Roles\Beholder;
use Slackwolf\Game\Roles\Bodyguard;
use Slackwolf\Game\Roles\Hunter;
use Slackwolf\Game\Roles\Lycan;
use Slackwolf\Game\Roles\Seer;
use Slackwolf\Game\Roles\Tanner;
use Slackwolf\Game\Roles\Witch;
use Slackwolf\Game\Roles\WolfMan;

/**
 * Defines the Role class.
 *
 * @package Slackwolf\Game
 */
class Role
{

    /**
     * @return bool
     */
	public function appearsAsWerewolf() {
		return false;
	}

    /**
     * @return bool
     */
	public function isWerewolfTeam() {
		return false;
	}

    /**
     * Returns the name of the current Role.
     *
     * @return string
     */
	public function getName() {
		return null;
	}

    /**
     * Returns the description of the Role.
     *
     * @return string
     */
	public function getDescription() {
		return null;
	}

    /**
     * Returns a bool on whether the Role name matches.
     *
     * @param $roleName
     *   The Role name to compare against.
     *
     * @return bool
     */
	public function isRole($roleName) {
		return $roleName == $this->getName();
	}

    const VILLAGER = "村人";
    const SEER = "占い師";
    const WEREWOLF = "人狼";

    const BEHOLDER = "予言者のママ";
    const BODYGUARD = "狩人";
    const HUNTER = "猫又?";
    const LYCAN = "狼憑き";
    const TANNER = "皮なめし職人";
    const WITCH = "魔女";
    const WOLFMAN = "狂人";

    public static function getSpecialRoles() {
    	return [
            new Beholder(),
            new Bodyguard(),
            new Hunter(),
            new Lycan(),
            new Seer(),
            new Tanner(),
            new Witch(),
            new WolfMan()
        ];
    }
}
