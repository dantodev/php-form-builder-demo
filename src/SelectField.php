<?php namespace App;

use Dtkahl\FormBuilder\Field;
use Dtkahl\TwigRenderableExtension\RenderableInterface;
use Dtkahl\TwigRenderableExtension\RenderableTrait;

class SelectField extends Field implements RenderableInterface
{
    use RenderableTrait;

    public function setUp(): void
    {
        $this->template = "forms/select.twig";
    }

    public function getRenderData(): array
    {
        return [
            "object" => $this,
            "options" => $this->getOption("options", []),
        ];
    }

}