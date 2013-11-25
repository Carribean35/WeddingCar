<?php

class ContentForm extends CFormModel
{

	public $phone;
    public $email;

	public function rules()
    {
        return array(
            array('phone, email', 'required'),
            array('email', 'email'),
		);
    }
	
	public function save() {
		die("save");
	}
	
}
