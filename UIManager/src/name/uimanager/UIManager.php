<?php

namespace name\uimanager;

use name\uimanager\event\ModalFormResponseEvent;
use pocketmine\event\Listener;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\network\mcpe\protocol\ModalFormResponsePacket;
use pocketmine\Player;
use pocketmine\network\mcpe\protocol\ModalFormRequestPacket;
use pocketmine\plugin\PluginBase;

class UIManager extends PluginBase implements Listener
{

    /** @var UIManager */
    private static $instance = null;

    /** @var CustomUI[] */
    private static $forms = [];

    public function onLoad()
    {
        self::$instance = $this;
    }

    public static function getInstance(): self
    {
        return static::$instance;
    }

    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    /**
     * @priority LOWEST
     * @param DataPacketReceiveEvent $event
     */
    public function response(DataPacketReceiveEvent $event)
    {
        $pk = $event->getPacket();
        if ($pk instanceof ModalFormResponsePacket) {
            $player = $event->getPlayer();
            (new ModalFormResponseEvent($player, json_decode($pk->formData, true), $pk->formId))->call();
            if (isset(self::$forms[$player->getName()])) {
                if (isset(self::$forms[$player->getName()][$pk->formId])) {
                    $form = $this->getForm($player, $pk->formId);
                    if ($form instanceof CustomUI) {
                        $form->handle(json_decode($pk->formData, true));
                        $this->unregisterForm($player, $pk->formId);
                    }
                }
            }
        }
    }

    public function registerForm(Player $player, CustomUI $form, int $formId)
    {
        if (!isset(self::$forms[$player->getName()]))
            self::$forms[$player->getName()] = [];
        self::$forms[$player->getName()][$formId] = $form;
    }

    public function unregisterForm(Player $player, int $formId)
    {
        if (isset(self::$forms[$player->getName()][$formId])) {
            unset(self::$forms[$player->getName()][$formId]);
        }
    }

    public function getForm(Player $player, int $formId): ?CustomUI
    {
        if (isset(self::$forms[$player->getName()][$formId]))
            return self::$forms[$player->getName()][$formId];
        return null;
    }

    public function sendUI(Player $player, CustomUI $form, int $formId)
    {
        $pk = new ModalFormRequestPacket();
        $pk->formId = $formId;
        $pk->formData = json_encode($form->getData());
        $player->sendDataPacket($pk);
        $this->registerForm($player, $form, $formId);
    }
}