<?php namespace Slackwolf\Game\Command;

use Slack\Channel;
use Slack\ChannelInterface;
use Slack\DirectMessageChannel;
use Slackwolf\Game\Role;

/**
 * Defines the HelpCommand class.
 */
class HelpCommand extends Command
{

    /**
     * {@inheritdoc}
     */
    public function fire()
    {
        $client = $this->client;

        $help_msg =  "\r\n*#人狼 の遊び方*\r\n------------------------\r\n";
        $help_msg .= "人狼は心理戦のパーティーゲームです．プレイヤーはゲームスタート時にDMで役割を知らされます．\r\n\r\n";
        $help_msg .= "村人は，投票と話し合いを参考に誰が人狼なのかを当てなければなりません．\r\n";
        $help_msg .= "人狼は，自分が人狼だとバレないように他の人を騙さなければなりません．\r\n\r\n";
        $help_msg .= "ゲームは数日行われ，それぞれに昼と夜が存在します．全てのプレイヤーは毎日誰を吊るし上げるか投票を行い，最も得票率の高いプレイヤーが処刑されます．同率で並んだ場合は誰も処刑されません．\r\n\r\n";
        $help_msg .= "夜になると，人狼は誰か一人の人間を選んで殺します．これは全会一致になるまで何度も決めます．決定はBotがDMで知らせます．";
        $help_msg .= "村人は全ての人狼を処刑すると勝利です．人狼はその数が村人以上になると勝利です．\r\n\r\n";
        $help_msg .= "*特殊な役職*\r\n------------------------\r\n";

        foreach(Role::getSpecialRoles() as $specialRole) {
            $help_msg .= '_'.$specialRole->getName() . "_ - " . $specialRole->getDescription() . "\r\n";
        }
        $help_msg .= "\r\n";

        $help_msg .= "*Game Commands*\r\n------------------------\r\n";
        $help_msg .= "`!new` - プレイヤーが `!join` コマンドで参加するためのロビーを作成\r\n";
        $help_msg .= "`!join` - 次のゲーム用のロビーに参加\r\n";
        $help_msg .= "`!leave` - 次のゲーム用のロビーを退出\r\n";
        $help_msg .= "`!start` - ロビーにいるプレイヤーを参加書としてゲームを開始\r\n";
        $help_msg .= "`!start all` - チャンネルに参加している全プレイヤーを参加者としてゲームを開始\r\n";
        $help_msg .= "`!start @user1 @user2 @user3` - 指定されたユーザーを参加者としてゲームを開始\r\n";
        $help_msg .= "`!end` - 途中でゲームを終了\r\n";
        $help_msg .= "`!option` - オプションを表示または変更． 現在の設定を表示する場合はパラメータ無しで使用\r\n";
        $help_msg .= "`!remindme` - 現在のゲームでの役割を通知\r\n";
        $help_msg .= "`!dead` - 死亡したプレイヤーを表示\r\n";
        $help_msg .= "`!alive` - 生きているプレイヤーを表示\r\n";
        $help_msg .= "`!status` - ゲームの状況を表示\r\n";

        $help_msg .= "\r\n*村人のコマンド*\r\n----------------------\r\n";
        $help_msg .= "`!vote @user1|noone|clear` - 吊し上げ対象の投票を行う．プレイヤーを選択，誰も選ばない，投票の取り消し が可能．(投票の取り消しは changevote オプションが有効になっている必要がある)\r\n";

        $help_msg .= "\r\n*人狼のコマンド*\r\n----------------------\r\n";
        $help_msg .= "`!kill #channel @user1` - Botに対してDMで行う．人狼が殺す対象を決める．人狼間で全会一致である必要がある．\r\n";

        $help_msg .= "\r\n*占い師のコマンド*\r\n--------------------------\r\n";
        $help_msg .= "`!see #channel @user1` -  占い師専用．選択したプレイヤーが村人か人狼かを知ることができる．#channelは現在プレイしているチャンネルを指定\r\n";

        $help_msg .= "\r\n*魔女のコマンド*\r\n-------------------------\r\n";
        $help_msg .= "`!poison #channel @user1` - 魔女専用. 夜に毒殺するプレイヤーを選ぶ．一回のゲームで一度のみ使用可能\r\n";
        $help_msg .= "`!heal #channel @user1` - 魔女専用. 夜に蘇生するプレイヤーを選ぶ．一回のゲームで一度のみ使用可能\r\n";

        $help_msg .= "\r\n*狩人のコマンド*\r\n---------------------\r\n";
        $help_msg .= "`!guard #channel @user1` - 狩人専用. 毎晩1人のプレイヤーを殺害から守る事ができる．2回連続して同じプレイヤーを守ることはできない．\r\n";

        $help_msg .= "\r\n*Hunter Commands*\r\n----------------------\r\n";
        $help_msg .= "\r\n*猫又?*\r\n----------------------\r\n";
        $help_msg .= "`!shoot @user1` - 殺された時に道連れにするプレイヤーを選択\r\n";

        $this->client->getDMByUserId($this->userId)->then(function(DirectMessageChannel $dm) use ($client, $help_msg) {
            $client->send($help_msg, $dm);
        });

        if ($this->channel[0] != 'D') {
            $client->getChannelGroupOrDMByID($this->channel)
               ->then(function (ChannelInterface $channel) use ($client) {
                   $client->send(":book: helpを見るにはDMを確認して下さい．", $channel);
               });
        }
    }
}
