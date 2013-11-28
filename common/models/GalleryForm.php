<?php

/**
 * GalleryForm class.
 * GalleryForm is the data structure for keeping
 * user login form data. It is used by the 'gallery' action of 'SiteController'.
 */
class GalleryForm extends CFormModel
{
	public $image;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
            array('image', 'file', 'types'=>'jpg, gif, png'),
        );
	}
	
	public function getImages() {
		$url = Yii::app()->assetManager->publish(
				Yii::getPathOfAlias('common').'/data/gallery/'
		);
		
		$path = Yii::app()->assetManager->getPublishedPath(
				Yii::getPathOfAlias('common').'/data/gallery/'
		);
		
		$images = scandir($path);
		$imgs = array();
		foreach ($images AS &$image) {
			if(preg_match('/\.(jpeg|jpg)/', $image)){
				$imgs[] = $url.'/'.$image;
			}
		}
		return $imgs; 
	}
	
}
