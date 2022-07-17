<?php
require "../../database/confi.php";
if(!isset($_SESSION)){
    session_start();
}

if(isset($_POST)){
	$email = $_POST['email'];
	$password = $_POST['password'];
	// print_r($email);
	// print_r($password) ;

	$sql = "SELECT * from customer
	where `email` = '$email'";
	// echo "<br>.$sql.<br>"   ;   
 
	// echo var_dump(executeResult($sql)) ;

	$res =  executeResult($sql);
	// print_r($res);
	if($res == null){
		// echo "<br>.trong.<br>";
		echo "tài khoản không tồn tại";
	}else{
		if(count($res) == 1){
			if($res[0]['password'] == $password ){
				$_SESSION[] = [
					'signin' => true,
					'id_user' => $res[0]["id"],
					'name_user' => $res[0]["name"],
					'phone_user' => $res[0]["phone"],
					'address_user' => $res[0]["address"],
					'email_user' => $email,
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

	// print json_encode($res);

}else{
	echo 'sai roi';
}
