<?php namespace App;

use Dtkahl\FormBuilder\FieldSet;
use Respect\Validation\Validator;

class PaymentFieldSet extends FieldSet
{

    public $template = "forms/payment.twig";

    public function setUp()
    {
        $this->setField('type', new SelectField([
                "options"=>["Credit Card", "PayPal"]
        ]))->setLabel('Payment Type');
        $this->setField('credit_card_number', new TextField)->setLabel('Credit Card Number');
        $this->setField('paypal_address', new TextField)->setLabel('PayPal Address');
    }

    public function setUpValidators() {
        $this->setValidator('type', Validator::notEmpty());
        if ($this->getValue('type') === 0) {
            $this->setValidator('credit_card_number', Validator::creditCard()->length(10,20));
        } else {
            $this->setValidator('paypal_address', Validator::email());
        }
    }

}