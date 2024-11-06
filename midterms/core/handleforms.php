<?php 

require_once 'dbconfig.php'; 
require_once 'models.php';

if (isset($_POST['insertInstructorBtn'])) {

	$query = insertInstructor($pdo, $_POST['InstructorId'], $_POST['uName'], 
		$_POST['Qualification'], $_POST['Experience'], $_POST['ContactInfo']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Insertion failed";
	}

}


if (isset($_POST['editInstructorBtn'])) {
	$query = updateInstructor($pdo, $_POST['uName'], $_POST['Qualification'], 
    $_POST['Experience'], $_POST['ContactInfo'], $_GET['InstructorId']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Edit failed";;
	}

}




if (isset($_POST['deleteInstructorBtn'])) {
	$query = deleteinstructor($pdo, $_GET['InstructorId']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Deletion failed";
	}
}




if (isset($_POST['insertNewClassBtn'])) {
	$query = insertClass($pdo, $_POST['ClassId'], $_POST['ClassName'], $_POST['DayOfWeek'], $_POST['Time'], $_GET['InstructorId']);

	if ($query) {
		header("Location: ../viewprojects.php?InstructorId=" .$_GET['InstructorId']);
	}
	else {
		echo "Insertion failed";
	}
}




if (isset($_POST['editClassBtn'])) {
	$query = updateClass($pdo, $_POST['ClassName'], $_POST['DayOfWeek'], $_POST['Time'], $_POST['InstructorId'], $_GET['ClassId']);

	if ($query) {
		header("Location: ../viewprojects.php?InstructorId=" .$_GET['InstructorId']);
	}
	else {
		echo "Update failed";
	}

}




if (isset($_POST['deleteClassBtn'])) {
	$query = deleteClass($pdo, $_GET['ClassId']);

	if ($query) {
		header("Location: ../viewprojects.php?InstructorId=" .$_GET['InstructorId']);
	}
	else {
		echo "Deletion failed";
	}
}

if (isset($_POST['registerUserBtn'])) {

	$username = $_POST['username'];
	$password = sha1($_POST['password']);

	if (!empty($username) && !empty($password)) {

		$insertQuery = insertNewUser($pdo, $username, $password);

		if ($insertQuery) {
			header("Location: ../login.php");
		}
		else {
			header("Location: ../register.php");
		}
	}

	else {
		$_SESSION['message'] = "Please make sure the input fields 
		are not empty for registration!";

		header("Location: ../login.php");
	}

}

if (isset($_POST['loginUserBtn'])) {

	$username = $_POST['username'];
	$password = sha1($_POST['password']);

	if (!empty($username) && !empty($password)) {

		$loginQuery = loginUser($pdo, $username, $password);
	
		if ($loginQuery) {
			header("Location: ../index.php");
		}
		else {
			header("Location: ../login.php");
		}

	}

	else {
		$_SESSION['message'] = "Please make sure the input fields 
		are not empty for the login!";
		header("Location: ../login.php");
	}
 
}

if (isset($_GET['logoutAUser'])) {
	unset($_SESSION['username']);
	header('Location: ../login.php');
}
?>