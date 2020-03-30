<?php

namespace name\uimanager\event;

use pocketmine\event\Event;
use pocketmine\event\HandlerList;
use pocketmine\Player;

class ModalFormResponseEvent extends Event
{

    /** @var HandlerList|null */
    public static $handlerList = null;

    /** @var Player */
    protected $player;

    protected $formData;

    /** @var int */
    protected $formId;

    public function __construct(Player $player, $formData, int $formId)
    {
        $this->player = $player;
        $this->formId = $formId;
        $this->formData = $formData;
    }

    public function getPlayer(): Player
    {
        return $this->player;
    }

    public function getFormData()
    {
        return $this->formData;
    }

    public function getFormId(): int
    {
        return $this->formId;
    }
}