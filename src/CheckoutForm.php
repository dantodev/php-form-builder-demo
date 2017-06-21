<?php namespace App;

use Dtkahl\FormBuilder\FieldSet;
use Psr\Container\ContainerInterface;
use Respect\Validation\Validator;

class CheckoutForm extends FieldSet
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        parent::__construct();
    }

    public function setUp()
    {
        $this->setField('order_id', new NumberField);
        $this->setFieldSet('delivery_address', new AddressFieldSet);
        $this->setFieldSet('payment', new PaymentFieldSet);
    }
    public function setUpValidators() {
        $this->setValidator('order_id', Validator::intType()->length(10, 10));
    }

    public function render()
    {
        return 'checkout';
    }

}