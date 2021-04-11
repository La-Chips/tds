<?php

namespace controllers;

use models\Basket;
use models\Basketdetail;
use models\Order;
use models\Product;
use models\Section;
use Ubiquity\attributes\items\router\Get;
use Ubiquity\attributes\items\router\Route;
use Ubiquity\controllers\auth\AuthController;
use Ubiquity\controllers\auth\WithAuthTrait;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
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
		$nbOrders = DAO::count(Order::class, 'idUser= ?', [USession::get("idUser")]);
		$promo = DAO::getAll(Product::class, 'promotion< ?', false, [0]);
		$nbBaskets = DAO::count(Basket::class, 'idUser= ?', [USession::get("idUser")]);
		$this->loadView('MainController/index.html', ['nbOrders' => $nbOrders, 'promo' => $promo, 'nbBaskets' => $nbBaskets]);
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
		$product = DAO::getAll(Product::class, 'idSection=' . $id, [USession::get("idSection")]);
		$section = DAO::getById(Section::class, $id, ['products']);
		$sections = DAO::getAll(Section::class, '', ['products']);
		$this->loadView('MainController/section.html', ['section' => $section, 'sections' => $sections, 'product' => $product]);
	}

	#[Route('product/{idSection}/{idProduct}', name: 'product')]
	public function product($idSection, $idProduct)
	{
		$product = DAO::getById(Product::class, $idProduct, ['sections']);
		$section = DAO::getById(Section::class, $idSection, ['products']);
		$sections = DAO::getAll(Section::class, '', ['products']);
		$this->loadView('MainController/product.html', ['section' => $section, 'sections' => $sections, 'product' => $product]);
	}

	#[Route('newBasket', name: 'newBasket')]
	public function newBasket()
	{
	}

	#[Route('basket', name: 'basket')]
	public function basket()
	{
		$baskets = DAO::getAll(Basket::class, 'idUser= ?', false, [USession::get("idUser")]);
		$this->loadView(['baskets' => $baskets]);
	}

	#[Get('basket/add/{idProduct}', name: 'addBasket')]
	public function addTo($idProduct, $quantity)
	{
		$basketDetails = new Basketdetail();
		URequest::setValuesToObject($basketDetails);
		if (DAO::insert($basketDetails)) {
		}
	}
}
