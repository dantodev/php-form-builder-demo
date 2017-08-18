<?php namespace App;

use Dtkahl\FormBuilder\Field;
use Dtkahl\TwigRenderableExtension\RenderableInterface;
use Dtkahl\TwigRenderableExtension\RenderableTrait;

class NumberField extends Field implements RenderableInterface
{
    use RenderableTrait;

    public function setUp(): void
    {
        $this->template = "forms/number.twig";
    }
}