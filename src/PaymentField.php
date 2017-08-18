<?php namespace App;

use Dtkahl\FormBuilder\MapField;
use Dtkahl\TwigRenderableExtension\RenderableInterface;
use Dtkahl\TwigRenderableExtension\RenderableTrait;
use Respect\Validation\Validator;

class PaymentField extends MapField implements RenderableInterface
{
    use RenderableTrait;

    public function setUp() : void
    {
        $this->template = "forms/payment.twig";

        $this->setChild('type', new SelectField(["options"=>["Credit Card", "PayPal"]]))
            ->setValidator(Validator::notEmpty())
            ->setOption('label', 'Payment Type');

        $this->setChild('credit_card_number', new TextField)
            ->setValidator(function (TextField $field) {
                /** @var MapField $parent */
                $parent = $field->getParent();
                if ($parent->getChild('type')->getValue() == 1) {
                    return Validator::creditCard()->length(10,20);
                }
                return null;
            })
            ->setOption('label', 'Credit Card Number');

        $this->setChild('paypal_address', new TextField)
            ->setValidator(function (TextField $field) {
                /** @var MapField $parent */
                $parent = $field->getParent();
                if ($parent->getChild('type')->getValue() == 0) {
                    return Validator::email();
                }
                return null;
            })
            ->setOption('label', 'PayPal Address');
    }

}