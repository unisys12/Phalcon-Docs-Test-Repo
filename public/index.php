<?php

/*
 *	This file acts as the bootstrap of your project
 */

try {

	/* These first lines create the autoloader
	 * for Phalcon. We instantiate the Phalcon loader,
	 * through it's namespace and assign it to
	 * the variable $loader. Next, we use the
	 * registerDirs() method to autoload our
	 * controllers and models dirs.
	 */
	$loader = new \Phalcon\Loader();
	$loader->registerDirs(
		array('../app/controllers', '../app/models')
		)->register();

	/* Next we create our dependency injection
	 * system. From there, we inject our
	 * Views and set a base URI for the project
	 */
	$di = new Phalcon\DI\FactoryDefault();

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

	/* Here instantiate our new application and pass
	 * it our dependecy injection service.
	 */
	$application = new \Phalcon\Mvc\Application($di);
	echo $application->handle()->getContent();
}

catch(\Phalcon\Exception $e) {
	echo "PhalconException: ", $e->$getMessage();
}
