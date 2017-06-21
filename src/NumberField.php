<?php namespace App;

use Dtkahl\FormBuilder\Field;

class NumberField extends Field
{
    public function render()
    {
        // keep in mind, this is only an simplified example. In a real project you would use a template engine for this
        return sprintf("<input type=\"number\" name=\"%s\" value=\"%s\"/>", $this->getName(), $this->getValue());
    }
}