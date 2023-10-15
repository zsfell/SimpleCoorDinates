<?php

namespace zs\coordinates;

use pocketmine\plugin\PluginBase;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\Listener;

use pocketmine\network\mcpe\protocol\GameRulesChangedPacket;

class Main extends PluginBase implements Listener {

    public function onEnable():void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onJoin(PlayerJoinEvent $event) {

        $packet = GameRulesChangedPacket::create(["showCoordinates" => (new GameRule)]);
        $player = $event->getPlayer();
        $session = $player->getNetworkSession();
        $session->sendDataPacket($packet);

    }



}
