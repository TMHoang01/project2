<?php
    require "../../database/confi.php";
    // echo json_encode($_GET);
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $sql = "SELECT `product`.* , `type`.`id_parent` from `product` INNER JOIN `type` on `product`.type_id = `type`.id  where `product`.id =$id;";
        // echo $sql;
        $result =executeResult($sql);
        echo json_encode($result[0]);
    }else{
        echo "not find ID item ";
    }