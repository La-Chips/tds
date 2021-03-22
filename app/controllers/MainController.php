<?php

namespace controllers;

use models\Product;
use Ubiquity\attributes\items\router\Route;
use Ubiquity\controllers\auth\AuthController;
use Ubiquity\controllers\auth\WithAuthTrait;
use Ubiquity\orm\DAO;

/**
 * Controller MainController
 **/
class MainController extends ControllerBase
{
	use WithAuthTrait;

	#[Route('_default', name: 'home')]
	public function index()
	{
		$promo = DAO::getAll(Product::class, 'promotion< ?', false, [0]);
		$this->loadView('MainController/index.html', ['promo' => $promo]);
	}

	protected function getAuthController(): AuthController
	{
		return new MyAuth($this);
	}
}
