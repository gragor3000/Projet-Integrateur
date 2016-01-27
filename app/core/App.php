<?php

class App
{
	protected $controller = 'Accueil';
	protected $method = 'index';
	protected $params = [];

	public function __construct()
	{
		$url = $this->parseUrl();

		if (file_exists('../app/controllers/' . $url[0] . '.php'))
		{
			$this->controller = $url[0];
			unset($url[0]);
		}
		
		require_once '../app/controllers/' . $this->controller . '.php';

		if (isset($url[1]))
		{
			if (method_exists($this->controller, $url[1]))
			{
				$this->method = $url[1];
				unset($url[1]);
			}
		}
		
		$controller = new $this->controller;
		$method = $this->method;

		$this->params = $url ? array_values ($url) : [] ;
		$controller->$method($this->params);
		//call_user_func_array([$this->controller, $this->method], $this->params );
	}

	 public function parseUrl()
 	{

		//print_r($_GET['URL']);
		//if (isset($_GET['URL'])) {
		//	return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		
		if (isset($_GET['url'])) {
			return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
 	}

}
