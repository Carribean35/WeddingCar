<?php

class PortfolioAddForm extends CFormModel
{

	public $id;
    public $name;
    public $text;
    public $image;
    public $visible;
    private $file = 'portfolio.json';
    public $formId = 'portfolio-form';

	public function rules()
    {
        return array(
            array('name, text', 'required'),
            array('id, visible', 'safe'),
		);
    }
	
	public function save() {
		$path = YiiBase::getPathOfAlias('common').'/data/'.$this->file;
		if (file_exists($path))
			$json = file_get_contents($path);
		$obj = array();
		if (!empty($json))
			$obj = CJSON::decode($json);
		$arr = array('name' => $this->name,
					'text' => $this->text,
					'visible' => $this->visible);
		if (!empty($this->id)) {
			$id = $this->id;
		} else {
			$id = 1;
			if (!empty($obj))
				$id = max(array_keys($obj)) + 1;
		}
		$arr['id'] = $id;
		
		$obj[$id] = $arr;
		
		$json = CJSON::encode($obj);
 		file_put_contents($path, $json);
 		
 		if(!empty($_FILES['PortfolioAddForm']['name']['image'])) {
 			$this->image=CUploadedFile::getInstance($this,'image');
 			$this->image->saveAs(Yii::getPathOfAlias('common').'/data/portfolio/'.$id.'.jpg');
 		}
		return $id;
	}
	
	public function getAll() {
		$path = YiiBase::getPathOfAlias('common').'/data/'.$this->file;
		$json = file_get_contents($path);
		if (!$json)
			return false;
		$obj = CJSON::decode($json);
		return $obj;
	}
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
				'name' => 'Имя',
				'text' => 'Отзыв',
				'visible' => 'Видимость',
				'image' => 'Изображение',
		);
	}
	
	public function getPortfolio($id) {
		$all = $this->getAll();
		if (empty($all[$id]))
			return false;
		$this->id = $id;
		$this->name = $all[$id]['name'];
		$this->text = $all[$id]['text'];
		$this->visible = $all[$id]['visible'];
		if (file_exists(Yii::getPathOfAlias('common').'/data/portfolio/'.$id.'.jpg'))
		$this->image = 	$id.'.jpg';
		
		return $all[$id];
	}
	
	public function del($id) {
		$path = YiiBase::getPathOfAlias('common').'/data/'.$this->file;
		$json = file_get_contents($path);
		if (!$json)
			return false;
		$obj = CJSON::decode($json);
		if (!empty($obj[$id]))
			unset($obj[$id]);
		$json = CJSON::encode($obj);
		file_put_contents($path, $json);
		
		$img = YiiBase::getPathOfAlias('common').'/data/portfolio/'.$id.'.jpg';
		if (file_exists($img))
			unlink($img);
	}
	
}
