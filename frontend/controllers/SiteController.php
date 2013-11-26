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
	public $content;
	public $galleryImages;
	
	public function actionIndex()
	{
		Yii::app()->clientScript->registerCoreScript('jquery');
		
		$this->content = new ContentForm();
		$this->content->aboutText = str_replace("\n", "<br>", $this->content->aboutText);
		$gallery = new GalleryForm();
		$this->galleryImages = $gallery->getImages();
		$this->content->actionDateEnd = explode(".", $this->content->actionDateEnd);
		$this->content->actionTimeEnd = explode(":", $this->content->actionTimeEnd);
		
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		Yii::app()->end("error");
// 		if($error=Yii::app()->errorHandler->error)
// 		{
// 			if(Yii::app()->request->isAjaxRequest)
// 				echo $error['message'];
// 			else
// 				$this->render('error', $error);
// 		}
	}
	
	public function actionSendMail() {
		
		if (isset($_POST['name']) && isset($_POST['phone'])) {
			$name = $_POST['name'];
			$phone = $_POST['phone'];
			if (!empty($_POST['text']))
				$text = $_POST['text'];
			
			$mailText = 'Имя : '.$name.'
Телефон : '.$phone.'';
			
			if (!empty($text)) {
				$mailText .= '
Заявка : '.$text;
			}
			
			SendMail::send($__smtp = Yii::app()->params['smtp']['addreply'], "Заявка", $mailText);
			
		}
	}
}