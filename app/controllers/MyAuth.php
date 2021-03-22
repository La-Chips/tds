<?php

namespace controllers;

use Ubiquity\utils\http\USession;
use Ubiquity\utils\http\URequest;
use controllers\auth\files\MyAuthFiles;
use models\User;
use Ubiquity\controllers\auth\AuthFiles;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\UResponse;

class MyAuth extends \Ubiquity\controllers\auth\AuthController
{

	protected function onConnect($connected)
	{
		$urlParts = $this->getOriginalURL();
		USession::set($this->_getUserSessionKey(), $connected);
		if (isset($urlParts)) {
			$this->_forward(implode("/", $urlParts));
		} else {
			UResponse::header('location', '/');
		}
	}

	protected function _connect()
	{
		if (URequest::isPost()) {
			$email = URequest::post($this->_getLoginInputName());
			if ($email != null) {
				$password = URequest::post($this->_getPasswordInputName());
				$user = DAO::getOne(User::class, 'email= ?', false, [$email]);
				if (isset($user)) {
					USession::set('idUser', $user->getId());
					return $user;
				}
			}
		}
		return;
	}

	/**
	 * {@inheritDoc}
	 * @see \Ubiquity\controllers\auth\AuthController::isValidUser()
	 */
	public function _isValidUser($action = null)
	{
		return USession::exists($this->_getUserSessionKey());
	}

	public function _getBaseRoute()
	{
		return 'MyAuth';
	}

	// protected function getFiles(): AuthFiles
	// {
	// 	return new MyAuthFiles();
	// }
}