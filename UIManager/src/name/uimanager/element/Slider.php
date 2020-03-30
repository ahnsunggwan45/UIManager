<?php
namespace name\uimanager\element;

class Slider extends Element
{

    /** @var float */
    protected $min = 0;

    /** @var float */
    protected $max = 0;

    /** @var float Only positive numbers */
    protected $step = 0;

    /** @var float */
    protected $defaultValue = 0;

    public function __construct($text, $min, $max, $step = 0)
    {
        if ($min > $max) {
            throw new \Exception(__METHOD__ . ' Borders are messed up');
        }
        $this->text = $text;
        $this->min = $min;
        $this->max = $max;
        $this->defaultValue = $min;
        $this->setStep($step);
    }

    public function setStep($step)
    {
        if ($step < 0) {
            throw new \Exception(__METHOD__ . ' Step should be positive');
        }
        $this->step = $step;
    }

    public function setDefaultValue($value)
    {
        if ($value < $this->min || $value > $this->max) {
            throw new \Exception(__METHOD__ . ' Default value out of borders');
        }
        $this->defaultValue = $value;
    }

    public function getData()
    {
        $data = [
            "type" => "slider",
            "text" => $this->text,
            "min" => $this->min,
            "max" => $this->max
        ];
        if ($this->step > 0) {
            $data["step"] = $this->step;
        }
        if ($this->defaultValue != $this->min) {
            $data["default"] = $this->defaultValue;
        }
        return $data;
    }
}