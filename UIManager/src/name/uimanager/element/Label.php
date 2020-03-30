<?php
namespace name\uimanager\element;

class Label extends Element
{

    private $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function getData()
    {
        return [
            "type" => "label",
            "text" => $this->text
        ];
    }
}