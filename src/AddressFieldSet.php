<?php namespace App;

use Dtkahl\FormBuilder\FieldSet;
use Respect\Validation\Validator;

class AddressFieldSet extends FieldSet
{
    protected $template = "forms/address.twig";

    public function setUp()
    {
        $this->setField('first_name', new TextField)->setLabel('First Name');
        $this->setField('last_name', new TextField)->setLabel('Last Name');
        $this->setField('street', new TextField)->setLabel('Street');
        $this->setField('number', new NumberField)->setLabel('Street Number');
        $this->setField('post_code', new TextField)->setLabel('Post Code');
        $this->setField('city', new TextField)->setLabel('City');
        $this->setField('country', new SelectField([
                "options" => ["Germany", "Switzerland", "Austria"]
        ]))->setLabel('Country');
    }

    public function setUpValidators() {
        $this->setValidator('first_name', Validator::stringType()->length(1,50));
        $this->setValidator('last_name', Validator::stringType()->length(1,50));
        $this->setValidator('street', Validator::stringType()->length(1,50));
        $this->setValidator('number', Validator::stringType()->length(1,5));
        $this->setValidator('post_code', Validator::stringType()->length(1,5));
        $this->setValidator('city', Validator::stringType()->length(1,50));
        $this->setValidator('country', Validator::stringType()->length(1,50));
    }

    public function render()
    {
        return 'address';
    }

}