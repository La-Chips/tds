<?php

namespace controllers;

use models\Product;
use models\Section;
use Ubiquity\attributes\items\router\Route;
use Ubiquity\controllers\auth\AuthController;
use Ubiquity\controllers\auth\WithAuthTrait;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\USession;

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

	#[Route('/store', name: 'store')]
	public function store()
	{
		$store = DAO::getAll(Product::class, false, false);
		$sections = DAO::getAll(Section::class, '', ['products']);
		$promos = DAO::getAll(Product::class, 'promotion< ?', false, [0]);
		$this->loadView('MainController/store.html', ['store' => $store, 'promo' => $promos, 'sections' => $sections]);
	}

	#[Route('/section/{id}', name: 'section')]
	public function section($id)
	{
		$product = DAO::getAll(Product::class, 'idSection= ' . $id, [USession::get("idSection")]);
		$section = DAO::getById(Section::class, $id, ['products']);
		$sections = DAO::getAll(Section::class, '', ['products']);
		$this->loadView('MainController/section.html', ['section' => $section, 'sections' => $sections, 'product' => $product]);
	}
}
