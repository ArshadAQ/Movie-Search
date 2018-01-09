<?php
// Start Session
session_start();

// Include Config
require('../config.php');

// require('../classes/Messages.php');
// require('../classes/Bootstrap.php');
// require('../classes/Controller.php');
// require('../classes/Model.php');

spl_autoload_register(function($class_name){
	require '../classes/'.$class_name.'.php';
});

// require('controllers/home.php');
// require('controllers/shares.php');
// require('controllers/users.php');

require('home.php');
require('fetch.php');

require('../models/home.php');
require('../models/fetch.php');

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if($controller){
	$controller->executeAction();
}