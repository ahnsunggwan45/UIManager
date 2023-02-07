<?php

namespace name\uimanager\element;

use Exception;

final class Slider extends Element{

    public int $defaultValue = 0;

    public function __construct(public string $text, public int $min, public int $max, public int $step = 0){
        $this->defaultValue = $min;
    }

    public function setDefaultValue($value){
        if($value < $this->min || $value > $this->max){
            throw new Exception(__METHOD__ . ' Default value out of borders');
        }
        $this->defaultValue = $value;
    }

    public function getData() : array{
        $data = [
            'type' => 'slider',
            'text' => $this->text,
            'min' => $this->min,
            'max' => $this->max
        ];
        if($this->step > 0){
            $data['step'] = $this->step;
        }
        if($this->defaultValue !== $this->min){
            $data['default'] = $this->defaultValue;
        }
        return $data;
    }
}