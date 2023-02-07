<?php

namespace name\uimanager;

use Closure;
use pocketmine\form\Form;
use pocketmine\player\Player;

abstract class CustomUI implements Form{

    public array $data = [];

    /** @var Closure|null */
    public ?Closure $f = null;

    public function setHandler(?Closure $f) : void{
        $this->f = $f;
    }

    public function getHandler() : ?Closure{
        return $this->f;
    }

    public function handle($value) : void{
        $f = $this->getHandler();
        if($f !== null){
            $f($value);
        }
    }

    public function setTitle(string $title) : void{
        $this->data['title'] = $title;
    }

    public function setContent(string $content) : void{
        $this->data['content'] = $content;
    }

    public function sendForm(Player $player) : void{
        $player->sendForm($this);
    }

    public function handleResponse(Player $player, $data) : void{
        $this->handle($data);
    }

    public function jsonSerialize() : array{
        return $this->data;
    }
}