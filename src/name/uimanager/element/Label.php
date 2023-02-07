<?php

namespace name\uimanager\element;

final class Label extends Element{

    public function __construct(public string $text){
    }

    public function getData() : array{
        return [
            'type' => 'label',
            'text' => $this->text
        ];
    }
}