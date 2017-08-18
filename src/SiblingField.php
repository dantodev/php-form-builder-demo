<?php namespace App;

use Dtkahl\FormBuilder\CollectibleInterface;
use Dtkahl\FormBuilder\MapField;
use Dtkahl\TwigRenderableExtension\RenderableInterface;
use Dtkahl\TwigRenderableExtension\RenderableTrait;
use Respect\Validation\Validator;

class SiblingField extends MapField implements RenderableInterface, CollectibleInterface
{
    use RenderableTrait;

    public function setUp() : void
    {
        $this->template = "forms/sibling.twig";

        $this->setChild('id', new TextField)
            ->setValidator(Validator::numeric())
            ->setOption('label', 'ID');
        $this->setChild('name', new TextField)
            ->setValidator(Validator::length(1,50))
            ->setOption('label', 'Name');
        $this->setChild('age', new TextField)
            ->setValidator(Validator::numeric())
            ->setOption('label', 'Age');
    }

    public function getUniqueIdentifier()
    {
        return $this->getChild('id')->getValue();
    }

}