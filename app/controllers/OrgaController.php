<?php
namespace controllers;

use models\Organization;
use Ubiquity\attributes\items\router\Route;
use Ubiquity\orm\DAO;

/**
  * Controller OrgaController
  */
class OrgaController extends ControllerBase{

	public function initialize()
	{
		parent::initialize();
		$this->loadView('orga/base.html');
	}

	#[Route(path: "orga/index",name:'index')]
	public function index(){
		 $orgas=DAO::getAll(Organization::class);
		
		$this->loadView('orga/index.html',['orgas'=>$orgas]);
	}

	



	#[Route(path: "orga/getOne/{id}", name:"orga")]
	public function getOne($id){
		$orga=DAO::getById(Organization::class,$id,['users','groupes']);
		$this->loadView('orga/orga.html',['orga'=>$orga]);
	}

	#[Route(path: "orga/getUser/{id}", name:"user")]
	public function getUser($id){
		// $user = DAO::getById(User::class,$id);
		$this->loadView('orga/users.html');
	}

	#[Route(path: "orga/getGroup/{id}", name:"group")]
	public function getGroup($id){
		// $user = DAO::getById(User::class,$id);
		$this->loadView('orga/groupe.html');
	}

}
