<?php namespace App;

use Dtkahl\FormBuilder\Field;

class TextField extends Field
{
    public function render()
    {
        // keep in mind, this is only an simplified example. In a real project you would use a template engine for this
        return sprintf("<input type=\"text\" name=\"%s\" value=\"%s\"/>", $this->getName(), $this->getValue());
    }
}