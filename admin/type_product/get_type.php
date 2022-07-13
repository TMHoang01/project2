<?php
    require "../../database/confi.php";

    $sql = "SELECT * from `type` ";
    $types = executeResult($sql);
    $sub_types = [];
    foreach ($types as $type) {
        if($type['id_parent'] == 0){
            $sub_types[$type['id']] = $type['name'];
            $sub_types[$type['id']] = [];
        }else{
            $sub_types[$type['id_parent']][] = $type['id'];
        } 
    }

    echo json_encode($sub_types);


?>