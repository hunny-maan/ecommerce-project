<?php
class Home{
	public $homeModel;
	public function __construct(){
		$this->homeModel = new Homemodel();
	}
}