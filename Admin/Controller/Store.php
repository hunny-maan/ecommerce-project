<?php
class Store {
	public $storeModel;
	/*public function __construct(){
		
	}*/
	
	public function storedata(){
		$this->storeModel = new Storemodel();
	}
}