<?php
class Autoloader {
	public function __construct(){
		spl_autoload_register(array($this, 'loader'));
	}

	public function loader($className){
		// include controller classes
		$file = self::getAbsolutePath().'Controller/'.$className.'.php';
		if(file_exists($file)){
			include $file;
		}
		else{
			// include model classes
			$file = self::getAbsolutePath().'Model/'.$className.'.php';
			if(file_exists($file)){
				include $file;
			}
			else{
				// include view classes
				$file = self::getAbsolutePath().'View/'.$className.'.php';
				if(file_exists($file)){
					include $file;
				}
			}
		}
		if(!file_exists($file)){
			echo "File not found";exit();
		}
	}

	public static function getBaseUrl(){
		return 'http://localhost/ecommerce-project/';
	}

	public static function getBasePath(){
		return '/ecommerce-project/';
	}

	public static function getAbsolutePath(){
		return $_SERVER['DOCUMENT_ROOT'].'/ecommerce-project/';
	}
}