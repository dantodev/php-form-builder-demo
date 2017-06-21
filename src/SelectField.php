<?php namespace App;

use Dtkahl\FormBuilder\Field;

class SelectField extends Field
{
    protected $config = ["options"=>[]];
    public function __construct($config)
    {
        $this->config = array_merge($this->config, $config);
    }
    public function render()
    {
        // keep in mind, this is only an simplified example. In a real project you would use a template engine for this
        $html = sprintf("<select name=\"%s\">", $this->getName());
        foreach ($this->config["options"] as $value=>$label) {
            if ($value === $this->getValue()) {
                $html .= sprintf("<option value=\"%s\" selected>%s</option>", $value, $label);
            } else {
                $html .= sprintf("<option value=\"%s\">%s</option>", $value, $label);
            }
        }
        return $html . "</select>";
    }
}