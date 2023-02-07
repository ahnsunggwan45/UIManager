<?php

namespace name\uimanager;

use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;

class UIManager extends PluginBase
{
    use SingletonTrait;

    public function onLoad(): void
    {
        self::$instance = $this;
    }

    public static function getInstance(): self
    {
        return static::$instance;
    }

    public function sendUI(Player $player, CustomUI $form): void
    {
        if($player->isOnline()) {
            $form->sendForm($player);
        }
    }
}