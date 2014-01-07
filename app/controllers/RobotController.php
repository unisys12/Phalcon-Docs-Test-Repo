<?php

use Phalcon\Mvc\Controller,
	Phalcon\Mvc\View;

class RobotController extends Controller
{
	public function indexAction()
	{
		$robot = Robots::findFirst(1);

	}

	public function createAction()
	{

	}
}
