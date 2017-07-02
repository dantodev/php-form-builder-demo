<?php namespace App;

use Dtkahl\FormBuilder\FieldSet;
use Psr\Container\ContainerInterface;
use Respect\Validation\Validator;

class CheckoutForm extends FieldSet
{
    protected $template = "forms/checkout.twig";

    public function setUp()
    {
        $this->setField('order_id', new NumberField)->setLabel('Order ID');
        $this->setFieldSet('delivery_address', new AddressFieldSet);
        $this->setFieldSet('payment', new PaymentFieldSet);
    }
    public function setUpValidators() {
        $this->setValidator('order_id', Validator::intType()->length(10, 10));
    }

}