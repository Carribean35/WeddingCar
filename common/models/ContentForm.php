<?php

class ContentForm extends CFormModel
{

	public $phone;
    public $email;
    public $actionText;
    public $aboutText;
    public $actionDateEnd;
    public $actionTimeEnd;
    public $formId = 'content-form';
    private $file = 'content.json';

	public function rules()
    {
        return array(
            array('phone, email, actionText, aboutText', 'required'),
            array('email', 'email'),
            array('actionDateEnd', 'date', 'format' => 'dd.MM.yyyy'),
            array('actionTimeEnd', 'date', 'format' => 'hh:mm:ss'),
		);
    }
	
	public function save() {
		$json = CJSON::encode($this);
		$path = YiiBase::getPathOfAlias('common').'/data/'.$this->file;
 		file_put_contents($path, $json);
		
		return true;
	}
	
	public function init() {
		$path = YiiBase::getPathOfAlias('common').'/data/'.$this->file;
		$json = file_get_contents($path);
		$obj = $json = CJSON::decode($json);
		$this->attributes=$obj;
	}
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
				'phone' => 'Телефон',
				'email' => 'Email',
				'actionText' => 'Акция',
				'aboutText' => 'О нас',
				'actionDateEnd' => 'Дата завершения акции',
		);
	}
	
}
