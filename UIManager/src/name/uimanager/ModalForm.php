<?php

namespace name\uimanager;

class ModalForm extends CustomUI
{

    protected $title = '';

    protected $content = '';

    protected $trueButtonText = '';

    protected $falseButtonText = '';

    public function __construct($title, $content, $trueButtonText, $falseButtonText, ?callable $f = null)
    {
        $this->title = $title;
        $this->content = $content;
        $this->trueButtonText = $trueButtonText;
        $this->falseButtonText = $falseButtonText;

        $this->setHandler($f);
    }

    /** @var callable|null */
    private $f;

    public function setHandler(?callable $f)
    {
        $this->f = $f;
    }

    public function getHandler(): ?callable
    {
        return $this->f;
    }

    public function handle($value)
    {
        $f = $this->getHandler();
        if ($f !== null)
            $f($value);
    }

    public function getData(): array
    {
        return [
            'type' => 'modal',
            'title' => $this->title,
            'content' => $this->content,
            'button1' => $this->trueButtonText,
            'button2' => $this->falseButtonText
        ];
    }
}