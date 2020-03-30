<?php

namespace name\uimanager;

use name\uimanager\element\Button;

class SimpleForm extends CustomUI
{

    /** @var string */
    protected $title = '';

    /** @var string */
    protected $content = '';

    /** @var Button[] */
    protected $buttons = [];

    /**
     * SimpleForm constructor.
     * @param $title
     * @param $content
     * @param callable|null $f
     */
    public function __construct($title, $content, ?callable $f = null)
    {
        $this->title = $title;
        $this->content = $content;
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

    /**
     * Add button to form
     *
     * @param Button $button
     */
    public function addButton(Button $button)
    {
        $this->buttons[] = $button;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }

    /**
     *
     * {@inheritdoc}
     * @see \name\uimanager\CustomUI::getData()
     */
    final public function getData()
    {
        $data = [
            'type' => 'form',
            'title' => $this->title,
            'content' => $this->content,
            'buttons' => []
        ];

        foreach ($this->buttons as $button) {
            $data['buttons'][] = $button->getData();
        }

        return $data;
    }
}