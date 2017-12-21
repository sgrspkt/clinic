<?php
include 'config.php';
$controllerName = ucfirst($_GET['controller']);
if($_SERVER['REQUEST_URI'] == '/clinic/'){
	header('location:http://localhost/clinic/index.php?controller=patient&task=loginPage');
}

$classname = "Controller\\".ucfirst($_GET['controller'])."Controller";
// die($classname);
$cn = new $classname;
$task = $_GET['task'];

/**
 * Starting the Output Buffer
 */
ob_start();

/**
 * Storing the $task value in $cn
 */
$cn->$task();

/**
 * [$output grab value present in the output buffer]
 * @var [task]
 */
$output = ob_get_contents();

/**
 * turns off this output buffering.
 */
ob_end_clean();

switch($controllerName){
	case 'Appointment':
	case 'User';
		include 'template/header.php';
		echo $output;
		include 'template/footer.php';
	break;

	case 'Patient';
		include 'template/p_header.php';
		echo $output;
		include 'template/footer.php';
	break;

	case 'Login';
		include 'admintemplate/login_header.html';
		echo $output;
		include 'admintemplate/admin_footer.html';
	break;

	case 'Api':
	echo $output;
		break;

	 default:
		include 'admintemplate/admin_header.html';
		echo $output;
		include 'admintemplate/admin_footer.html';
}

?>
