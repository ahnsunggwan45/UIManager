<?php
namespace name\uimanager\element;

class DropDown extends Element
{

    private $text = "";

    private $options = [];

    private $defaultOptionIndex = 0;

    public function __construct(string $text, array $options)
    {
        $this->text = $text;
        $this->options = $options;
    }

    public function setDefaultOptionIndex(int $index)
    {
        $this->defaultOptionIndex = $index;
    }

    public function addOption(string $option)
    {
        $this->options[] = $option;
    }

    public function getData()
    {
        return [
            'type' => 'dropdown',
            'text' => $this->text,
            'options' => $this->options,
            'default' => $this->defaultOptionIndex
        ];
    }
}