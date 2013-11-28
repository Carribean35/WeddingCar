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
	public $portfolio;
	
	public function actionIndex()
	{
		Yii::app()->clientScript->registerCoreScript('jquery');
		
		Yii::app()->clientScript->registerScriptFile(
			Yii::app()->assetManager->publish(
				Yii::getPathOfAlias('webroot').'/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js'
			),
			CClientScript::POS_END
		);
		
		$this->content = new ContentForm();
		$this->content->aboutText = str_replace("\n", "<br>", $this->content->aboutText);
		$gallery = new GalleryForm();
		$this->galleryImages = $gallery->getImages();
		$this->content->actionDateEnd = explode(".", $this->content->actionDateEnd);
		$this->content->actionTimeEnd = explode(":", $this->content->actionTimeEnd);
		
		$this->portfolio = $this->buildPortfolio();
		
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
			$content = new ContentForm();
			SendMail::send($content->email, "Заявка", $mailText);
		}
	}
	
	private function buildPortfolio() {
		$model = new PortfolioAddForm();
		$arr = $model->getAll();
		
		$url = Yii::app()->assetManager->publish(
				Yii::getPathOfAlias('common').'/data/portfolio/'
		);
		
		return $this->renderPartial("portfolio", array('list' => $arr, 'url' => $url), true);
	}
}