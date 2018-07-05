<?php
/*
 *	Sets the minimum things required to run the application, 
 * Set Defines used all throughout the application
 */
	error_reporting(E_ALL);
	define('ROOT_DIR', dirname(__FILE__));	
	define('INCLUDES_DIR', ROOT_DIR . '/includes');
	define('CONTROLLER_DIR', ROOT_DIR . '/controller');
	define('TEMPLATE_DIR', ROOT_DIR . '/template');
	define('VIEW_DIR', ROOT_DIR . '/view');
	define('MODEL_DIR', ROOT_DIR . '/model');
	define('JAVASCRIPT_URL', HOME_URL . '/js');
	
	require_once(INCLUDES_DIR . "/class.Route.inc.php");
	require_once(INCLUDES_DIR . "/class.Routing.inc.php");
	require_once(INCLUDES_DIR . "/class.Register.inc.php");
	require_once(INCLUDES_DIR . "/class.Response.inc.php");
	require_once(INCLUDES_DIR . "/class.Serve.inc.php");
	require_once(INCLUDES_DIR . "/class.Database.inc.php");
	