<?php

namespace name\uimanager\element;

final class StepSlider extends Element{

    public int $defaultStepIndex = 0;

    public function __construct(public string $text, public array $steps = []){
    }

    public function addStep(string $stepText, bool $isDefault = false) : self{
        if($isDefault){
            $this->defaultStepIndex = count($this->steps);
        }
        $this->steps[] = $stepText;

        return $this;
    }

    public function setSteps(array $steps) : self{
        $this->steps = $steps;
        return $this;
    }

    public function getData() : array{
        return [
            'type' => 'step_slider',
            'text' => $this->text,
            'steps' => $this->steps,
            'default' => $this->defaultStepIndex
        ];
    }
}