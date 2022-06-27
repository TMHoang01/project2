<?php
    require "../../database/confi.php";
    echo json_encode($_POST);
    if(isset($_POST["id"])){
        $id = $_POST["id"];
        $sql = "DELETE from `product` where id= $id;";
        $link_img = '.'.$_POST['img'];
        if (file_exists($link_img)) {
            unlink($link_img);
        }else
        echo $sql;
        execute($sql);
        echo "deleted ".$id." successfull";
    }else{
        echo "not find ID item want DELETE";
    }