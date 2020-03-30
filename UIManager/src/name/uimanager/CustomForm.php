<?php

namespace name\uimanager;

use name\uimanager\element\Element;

class CustomForm extends CustomUI
{

    private $data = [
        'type' => 'custom_form',
        'title' => '',
        'content' => []
    ];

    /** @var callable|null */
    private $f;

    public function __construct(string $title, ?callable $f = null)
    {
        $this->setTitle($title);
        $this->setHandler($f);
    }

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

    public function setTitle(string $title)
    {
        $this->data['title'] = $title;
    }

    public function addElement(Element $element)
    {
        $this->data['content'][] = $element->getData();
    }

    public function getData(): array
    {
        return $this->data;
    }
}