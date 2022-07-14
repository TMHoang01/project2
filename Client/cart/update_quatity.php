<?php
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $type = $_GET['type'];
        if($type =="add"){
            $_SESSION['cart'][$id]['quatity'] ++;
        }else if($type =="sub"){
            $_SESSION['cart'][$id]['quatity'] --;
        }
        // echo json_encode( $_SESSION['cart'][$id]);
    }

