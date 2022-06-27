<?php
session_start();
require "../../database/confi.php";
if(!isset($_SESSION)){
    session_start();
}

if(isset($_POST)){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$sql = "SELECT * from `admin`
	where `email` = '$email'";
	// echo "<br>.$sql.<br>"   ;   


	$res =  executeResult($sql);
	// print_r($res);
	if($res == null){
		// echo "<br>.trong.<br>";
		echo "tài khoản không tồn tại";
	}else{
		if(count($res) == 1){
			if($res[0]['password'] == $password ){
				$_SESSION = [
					'admin'=>[
						'signin' => true,
						'id' => $res[0]["id"],
						'name' => $res[0]["name"],
						'email' => $email,
					]
				];
				echo "Dng nhap thanh cong";
				print_r($_SESSION);

			}else{
				echo "Sai Mat khau";
			}
		}else{
			echo "Loi co the bi hack";
		}
	}
}