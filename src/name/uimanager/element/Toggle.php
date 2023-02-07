<?php

namespace name\uimanager\element;

final class Toggle extends Element{

    public function __construct(public string $text, public bool $value = false){
    }

    public function setDefaultValue(bool $value = false){
        $this->value = $value;
    }

    public function getData() : array{
        return [
            'type' => 'toggle',
            'text' => $this->text,
            'default' => $this->value
        ];
    }
}