<?php
require '../../database/confi.php';
if(!isset($_SESSION)){
    session_start();
}

// unset($_SESSION['cart']);
// $id = 0;
if(isset($_GET["id"])){
    $id = $_GET["id"];
    if(empty($_SESSION['cart'][$id])){
        $sql = "SELECT * from `product` 
        where `id`=$id";
        // echo $sql;
        $item = getSingleResuslt($sql);
        // echo json_encode($item);
        if(!empty($item)){
            $_SESSION['cart'][$id]['name'] = $item['name'];
            $_SESSION['cart'][$id]['cost'] = $item['cost'];
            $_SESSION['cart'][$id]['image'] = $item['image'];
            $_SESSION['cart'][$id]['quatity'] = 1;
        }
    }else{
            $_SESSION['cart'][$id]['quatity'] ++;
            // $_SESSION['cart'][$id] = 1;   
    }
}

    echo count($_SESSION['cart']);
// if(empty($_SESSION['cart'])){
//     $_SESSION['cart'][$id] = 1;
// }else{

// }