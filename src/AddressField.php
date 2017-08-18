<?php namespace App;

use Dtkahl\FormBuilder\MapField;
use Dtkahl\TwigRenderableExtension\RenderableInterface;
use Dtkahl\TwigRenderableExtension\RenderableTrait;
use Respect\Validation\Validator;

class AddressField extends MapField implements RenderableInterface
{
    use RenderableTrait;

    public function setUp() : void
    {
        $this->template = "forms/address.twig";

        $this->setChild('first_name', new TextField)
            ->setValidator(Validator::length(1,50))
            ->setOption('label', 'First Name');
        $this->setChild('last_name', new TextField)
            ->setValidator(Validator::length(1,50))
            ->setOption('label', 'Last Name');
        $this->setChild('street', new TextField)
            ->setValidator(Validator::length(1,50))
            ->setOption('label', 'Street');
        $this->setChild('number', new NumberField)
            ->setValidator(Validator::length(1,5))
            ->setOption('label', 'Street Number');
        $this->setChild('post_code', new TextField)
            ->setValidator(Validator::length(1,5))
            ->setOption('label', 'Post Code');
        $this->setChild('city', new TextField)
            ->setValidator(Validator::length(1,50))
            ->setOption('label', 'City');
        $this->setChild('country', new SelectField(["options" => ["Germany", "Switzerland", "Austria"]]))
            ->setValidator(Validator::length(1,50))
            ->setOption('label', 'Country');
    }

}