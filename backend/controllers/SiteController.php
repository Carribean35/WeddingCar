<?php
/**
 *
 * SiteController class
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
class SiteController extends EController
{
	public function filters()
	{
		return array(
				'accessControl',
		);
	}
	
	public function accessRules()
	{
		return array(
				array('deny',
						'actions'=>array('index'),
						'users'=>array('?'),
				),
				array('allow',
						'actions'=>array('index'),
						'users'=>array('@'),
				),
		);
	}	
	
	public function actionIndex()
	{
		
		$model = new ContentForm();
		
		if(isset($_POST['ContentForm'])) {
			$model->attributes=$_POST['ContentForm'];
			$this->performAjaxValidation($model);
			
			if($model->save()) {
				if (Yii::app()->request->isAjaxRequest) {
					echo CJSON::encode(
						array(
							'error'=>false,
						)
					);
					Yii::app()->end();
				}
			}
		}
		
		$this->render('index', array('model' => $model));
	}
	
	public function actionGallery()
	{
		if(!empty($_FILES['GalleryForm']['name']['image'])) {
			$galleryModel = new GalleryForm();
			$galleryModel->image=CUploadedFile::getInstance($galleryModel,'image');
			$galleryModel->image->saveAs(Yii::getPathOfAlias('common').'/data/gallery/'.$galleryModel->image->getName());
			$this->redirect("/site/gallery/");
		}
		
		$galleryModel = new GalleryForm();
		$images = $galleryModel->getImages();

		$this->render('gallery', array('images' => $images, 'galleryModel' => $galleryModel));
	}
	
	public function actionLogin() {
		$this->layout = '//layouts/login';
        $model = new LoginForm();

        /**
         * @var CWebUser $user
         */
        $user = Yii::app()->user;
        if (!$user->isGuest) {
            $this->redirect(Yii::app()->user->returnUrl);
        }
        if(isset($_POST['LoginForm']))
        {
		    $model->attributes=$_POST['LoginForm'];
            
            if($model->validate() && $model->login()) {
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        
        $this->render('login',array(
            'model'=>$model,
        ));
	}
	
	public function actionError() {
		die("error");
	}
	
	public function actionDeleteGalleryImage() {
		if (isset($_POST['name'])) {
			$path = Yii::getPathOfAlias('common').'/data/gallery/'.$_POST['name'];
			if (file_exists($path)) {
				unlink(Yii::getPathOfAlias('common').'/data/gallery/'.$_POST['name']);
			}
		}
	}
}