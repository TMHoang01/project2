<?php
require "../../database/confi.php";


if(isset($_POST)){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	// print_r($email);
	// print_r($password) ;

	$sql = "SELECT `email`,`password` from customer
	where `email` = '$email'";

	$result = executeResult($sql);
	if(count($result) == 1){
		echo "Trung email";

		exit;
	}else{

	}
	$sql = "INSERT into customer(name,email,password)
		values ('$name','$email', '$password')";
	echo $sql;
	execute($sql);


}else{
	echo 'sai roi';
}