<?php
namespace name\uimanager\element;

class StepSlider extends Element
{

    /** @var string[] */
    protected $steps = [];

    /** @var integer Step index */
    protected $defaultStepIndex = 0;

    public function __construct($text, $steps = [])
    {
        $this->text = $text;
        $this->steps = $steps;
    }

    public function addStep($stepText, $isDefault = false): StepSlider
    {
        if ($isDefault) {
            $this->defaultStepIndex = count($this->steps);
        }
        $this->steps[] = $stepText;

        return $this;
    }

    public function setSteps(array $steps)
    {
        $this->steps = $steps;
    }

    public function getData()
    {
        return [
            'type' => 'step_slider',
            'text' => $this->text,
            'steps' => $this->steps,
            'default' => $this->defaultStepIndex
        ];
    }
}