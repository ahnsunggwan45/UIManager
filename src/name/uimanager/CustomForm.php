<?php

namespace name\uimanager;

use name\uimanager\element\Element;
use pocketmine\form\Form;
use pocketmine\Player;

class CustomForm extends CustomUI
{

    public array $data = [
        'type' => 'custom_form',
        'title' => '',
        'content' => []
    ];

    public function __construct(string $title, ?callable $f = null)
    {
        $this->data['title'] = $title;
        $this->f = $f;
    }

    public function addElement(Element $element): self
    {
        $this->data['content'][] = $element->getData();
        return $this;
    }
}