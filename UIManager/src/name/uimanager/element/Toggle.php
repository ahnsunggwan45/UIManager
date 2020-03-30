<?php
namespace name\uimanager\element;

class Toggle extends Element
{

    /** @var boolean */
    protected $defaultValue = false;

    /**
     *
     * @param string $text
     * @param bool $value
     */
    public function __construct($text, bool $value = false)
    {
        $this->text = $text;

        $this->defaultValue = $value;
    }

    public function setDefaultValue(bool $value)
    {
        $this->defaultValue = $value;
    }

    public function getData()
    {
        return [
            "type" => "toggle",
            "text" => $this->text,
            "default" => $this->defaultValue
        ];
    }
}