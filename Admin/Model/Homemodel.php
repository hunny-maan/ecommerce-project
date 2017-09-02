<?php
class Homemodel{
	public $title;
	public function __construct(){
		$this->setView();		
	}

	public function setView(){
		include 'View/home.php';
	}

	public function getHomeData(){
		$this->title = "Admin Home Page" ;
		return $this->title;
	}
}