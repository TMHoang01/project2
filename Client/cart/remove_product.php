<?php 
if(!isset($_SESSION)){
    session_start();
}

if(isset($_GET["id"])){
    $id = $_GET["id"];
    unset($_SESSION['cart'][$id]);
    echo json_encode($_SESSION['cart']);
}else{
    echo "Xoa that bai";
}




// check data ajax resonpse T/F