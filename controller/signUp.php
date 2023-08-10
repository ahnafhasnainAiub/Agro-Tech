<?php 
	session_start();

	if(isset($_POST["submit"])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$usertype = $_POST['type'];
    $phonenumber = $_POST['number'];

	if($firstname == null|| $lastname == null || $username == null || $password == null || $email == null || $phonenumber== null || $usertype == null ){
		echo "Not all info given";
	}else{

		$user = $firstname."|".$lastname."|".$username."|".$password."|".$email."|".$usertype."|".$phonenumber."\r\n";
		$file = fopen('user.txt', 'a');
		fwrite($file, $user);
		header('location: index.php');
	}}

	/*$_POST 
	$_REQUEST
	$_SESSION 
	$_SERVER 
	$GLOBALS 
	$_COOKIE*/


?>