<?php

namespace name\uimanager\element;

final class Input extends Element{

    public function __construct(public string $text, public string $placeholder, public string $default){
    }

    public function getData() : array{
        return [
            'type' => 'input',
            'text' => $this->text,
            'placeholder' => $this->placeholder,
            'default' => $this->default
        ];
    }
}