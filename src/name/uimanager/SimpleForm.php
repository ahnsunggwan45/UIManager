<?php

namespace name\uimanager;

use Closure;
use name\uimanager\element\Button;
use pocketmine\player\Player;

class SimpleForm extends CustomUI{

    public array $data = [
        'type' => 'form',
        'title' => '',
        'content' => '',
        'buttons' => []
    ];

    public function __construct(string $title, string $content, ?Closure $f = null){
        $this->data['title'] = $title;
        $this->data['content'] = $content;
        $this->f = $f;
    }

    public function addButton(Button $button) : self{
        $this->data['buttons'][] = $button->getData();
        return $this;
    }

    public function handleResponse(Player $player, $data) : void{
        $this->handle($data);
        $buttonData = $this->data['buttons'][$data] ?? null;
        if($buttonData !== null){
            $text = $buttonData['text'];
        }
    }
}