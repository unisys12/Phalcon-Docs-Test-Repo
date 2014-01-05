<?php

class WalkingRobotController extends \Phalcon\Mvc\Controller
{
	public function indexAction()
	{
		$robot = WalkingRobots::findFirst(1);

		echo $robot->robot_name;
	}
}
