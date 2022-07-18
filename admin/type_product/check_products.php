<?php
    require "../../database/confi.php";
    // count product in type
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT count(*) as count from `product` where type_id = $id;";
        $result =executeResult($sql);
        echo json_encode($result[0]['count']);
    }else{
        echo 0;
    }