<?php

namespace name\uimanager\element;

class Input extends Element
{

    private $data = [
        "type" => "input",
        "text" => "",
        "placeholder" => "",
        "default" => ""
    ];

    public function __construct(string $text, string $placeholder, string $default)
    {
        $this->data["text"] = $text;
        $this->data["placeholder"] = $placeholder;
        $this->data["default"] = $default;
    }

    public function getData()
    {
        return $this->data;
    }
}