<?php
class Routing {
	public function __construct(){
		// get current url
		$uri = $_SERVER['REQUEST_URI'];
		if(!empty($uri)){
			/* get base path of directory.
			   replace this base path to current url and get file path and parameters*/
			$basePath = Autoloader::getBasePath();
			$newUrl = str_replace($basePath, "", $uri);
			if(!empty($newUrl)){
				if(strpos($newUrl, "/") == TRUE){
					$breakUrl = array_filter(explode("/", $newUrl));
					$class = $breakUrl[0];
					if(class_exists($class)){
						$classObj = new $class();
						if(!empty($breakUrl[1])){
							$method = $breakUrl[1];
							if(method_exists($classObj, $method)){
								$params = array();
								if(count($breakUrl) > 2){		
									for ($i=2, $j = 0; $i < count($breakUrl); $i++, $j++) { 
										$params[$j] = $breakUrl[$i];
									}
								}
								if(!empty($params)){
									call_user_func_array(array($classObj, $method), $params);	
								}
								else{
									call_user_func(array($classObj, $method));
								}
							}							
						}						
					}
				}
			}
			else{
				$home = new Home();
			}
		}
	}
}