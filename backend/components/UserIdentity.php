<?php 

class UserIdentity extends CUserIdentity
{
	private $_id;

	private $admins = array();

	public function __construct($username, $password) {
		parent::__construct($username, $password);
		
		$this->admins = require_once(__DIR__.'/../config/admins.php');
	}
	
	public function authenticate()
	{
		$record = false;
		if (!empty($this->admins['admin']))
			$record = $this->admins['admin'];

		if($record===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($record['password']!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->_id=$record['id'];
			$this->setState('title', $record['title']);
			$this->errorCode=self::ERROR_NONE;
		}

		return !$this->errorCode;
	}

	public function getId()
	{
		return $this->_id;
	}
}