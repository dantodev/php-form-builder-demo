<?php namespace App;

use Dtkahl\FormBuilder\Field;

class SelectField extends Field
{
    protected $template = "forms/select.twig";
    protected $config = ["options"=>[]];

    public function __construct($config)
    {
        $this->config = array_merge($this->config, $config);
    }

    public function getRenderData(array $data = []): array
    {
        $data = parent::getRenderData($data);
        $data["options"] = $this->config["options"];
        return $data;
    }

}