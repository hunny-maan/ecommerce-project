<?php
class Storemodel{
	public $title;
	public function __construct(){
		$this->setView();		
	}

	public function setView(){
		include 'View/store.php';
	}

	public function getHomeData(){
		$this->title = "My Store" ;
		return $this->title;
	}
}