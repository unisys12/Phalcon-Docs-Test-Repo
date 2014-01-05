<?php

/*
 *	This file acts as the bootstrap of your project
 */

try {

	$loader = new \Phalcon\Loader();
	$loader->registerDirs(
		array('../app/controllers', '../app/models')
		)->register();

	$di = new Phalcon\DI\FactoryDefault();

	$di->set('db', function()
	{
		return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
			"host" 		=> "localhost",
			"username" 	=> "root",
			"password" 	=> "",
			"dbname"	=> "phalcon_tests"
		));
	});

	$di->set('view', function()
	{
		$view = new Phalcon\Mvc\View();
		$view->setViewsDir('../app/views/');
		return $view;
	});

	$di->set('url', function()
	{
		$url = new \Phalcon\Mvc\Url();
		$url->setBaseUrl('/tutorial/');
		return $url;
	});

	$application = new \Phalcon\Mvc\Application($di);
	echo $application->handle()->getContent();
}

catch(\Phalcon\Exception $e) {
	echo "PhalconException: ", $e->$getMessage();
}
