<?php

class RobotController extends \Phalcon\Mvc\Controller
{
	public function indexAction()
	{
		$robot = Robots::findFirst(1);

		echo $robot->robot_name;
	}
}
