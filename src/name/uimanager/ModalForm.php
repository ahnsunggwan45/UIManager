<?php

namespace name\uimanager;

use Closure;

class ModalForm extends CustomUI{

    public array $data = [
        'type' => 'modal',
        'title' => '',
        'content' => '',
        'button1' => '',
        'button2' => ''
    ];

    public function __construct(string $title, string $content, string $trueButtonText = '', string $falseButtonText = '', ?Closure $f = null){
        $this->data['title'] = $title;
        $this->data['content'] = $content;
        $this->data['button1'] = $trueButtonText;
        $this->data['button2'] = $falseButtonText;

        $this->f = $f;
    }

    public function setTrueButtonText(string $text) : self{
        $this->data['button1'] = $text;
        return $this;
    }

    public function setFalseButtonText(string $text) : self{
        $this->data['button2'] = $text;
        return $this;
    }
}