<?php
namespace controllers;
use Ubiquity\attributes\items\router\Get;
use Ubiquity\attributes\items\router\Post;
use Ubiquity\attributes\items\router\Route;
 /**
  * Controller TodosController
  */
class TodosController extends ControllerBase{

	public function index(){
		
  }
  

	#[Route(path: "todos/delete/{index}")]
	public function deleteElement($index){
		
	}


	#[Post(path: "TodosController/addElement")]
	public function addElement(){
		
	}



	#[Post(path: "todos/edit/{index}")]
	public function editElement($index){
		
	}


	#[Get(path: "todos/loadList/{uniqid}")]
	public function loadList($uniqid){
		
	}


	#[Post(path: "todos/loadList/")]
	public function loadListFromForm(){
		
	}


	#[Get(path: "todos/new/{force}")]
	public function newlist($force){
		
	}


	#[Get(path: "todos/saveList")]
	public function saveList(){
		
	}

}
