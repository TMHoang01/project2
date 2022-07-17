<?php
    require "../../database/confi.php";
    if(isset($_GET['id_type'])){
        $id_type = $_GET['id_type'];
        $sql = "SELECT * from `type` where id_parent = $id_type";
        $sub_types = executeResult($sql);

        echo json_encode($sub_types);
    }



?>