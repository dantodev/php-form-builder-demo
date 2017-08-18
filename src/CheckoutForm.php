<?php namespace App;

use Dtkahl\FormBuilder\CollectionField;
use Dtkahl\FormBuilder\MapField;
use Dtkahl\TwigRenderableExtension\RenderableInterface;
use Dtkahl\TwigRenderableExtension\RenderableTrait;
use Respect\Validation\Validator;

class CheckoutForm extends MapField implements RenderableInterface
{
    use RenderableTrait;

    public function setUp() : void
    {
        $this->template = "forms/checkout.twig";
        $this->setChild('order_id', new NumberField)
            ->setValidator(Validator::numeric()->length(10, 10))
            ->setOption('label', 'Order ID');
        $this->setChild('delivery_address', new AddressField);
        $this->setChild('payment', new PaymentField);
        $this->setChild('siblings', new CollectionField(["child_class" => SiblingField::class]));
    }

}