<?php

namespace name\uimanager\element;

final class DropDown extends Element{

    public function __construct(public string $text, public array $options, public int $defaultIndex = 0){
    }

    public function setDefaultOptionIndex(int $index){
        $this->defaultIndex = $index;
    }

    public function addOption(string $option){
        $this->options[] = $option;
    }

    public function getData() : array{
        return [
            'type' => 'dropdown',
            'text' => $this->text,
            'options' => $this->options,
            'default' => $this->defaultIndex
        ];
    }
}