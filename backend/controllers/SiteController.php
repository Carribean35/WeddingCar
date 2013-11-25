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
		
		
		
		$this->render('index', array('model' => $model));
	}
	
	public function actionGallery()
	{
		$this->render('gallery');
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
}