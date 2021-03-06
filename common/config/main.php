<?php
/**
 *
 * main.php configuration file
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
return array(
	'language' => 'ru',
	'preload' => array('log'),
	'aliases' => array(
		'frontend' => dirname(__FILE__) . '/../..' . '/frontend',
		'common' => dirname(__FILE__) . '/../..' . '/common',
		'backend' => dirname(__FILE__) . '/../..' . '/backend',
		'vendor' => dirname(__FILE__) . '/../..' . '/common/lib/vendor'
	),
	'import' => array(
		'common.extensions.components.*',
		'common.components.*',
		'common.helpers.*',
		'common.models.*',
		'application.components.*',
		'application.controllers.*',
		'application.extensions.*',
		'application.helpers.*',
		'application.models.*'
	),
	'components' => array(
// 		'db'=>array(
// 			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
// 		),
		'errorHandler' => array(
			'errorAction' => 'site/error',
		),
// 		'log' => array(
// 			'class'  => 'CLogRouter',
// 			'routes' => array(
// 				array(
// 					'class'        => 'CDbLogRoute',
// 					'connectionID' => 'db',
// 					'levels'       => 'error, warning',
// 				),
// 			),
// 		),
		'mailer' => array(
				'class' => 'common.extensions.mailer.EMailer',
// 				'pathViews' => 'application.views.email',
// 				'pathLayouts' => 'application.views.email.layouts'
		),
	),
	'params' => array(
		// php configuration
		'php.defaultCharset' => 'utf-8',
		'php.timezone'       => 'UTC',
		'smtp' => array(
				"host" => "smtp.jino.ru", //smtp сервер
				"debug" => 1, //отображение информации дебаггера (0 - нет вообще)
				"auth" => true, //сервер требует авторизации
				"port" => 587, //порт (по-умолчанию - 25)
				"username" => "support@weding-car.ru", //имя пользователя на сервере
				"password" => "hQfc8Gs3AD", //пароль
				"addreply" => "support@weding-car.ru", //ваш е-mail
				"replyto" => "", //e-mail ответа
				"fromname" => "wedding-car.ru", //имя
				"from" => "support@weding-car.ru", //от кого
				"charset" => "utf-8", //от кого
		)
	)
);