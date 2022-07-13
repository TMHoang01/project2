<?php
    require "../../database/confi.php";

    if(isset($_GET)){
        // add type
        $name = $_GET['name'];
        $id_parent = $_GET['id_parent'];
        $sql = 'INSERT into `type` (`name`, id_parent)
                values("'.$name.'",'.$id_parent.');';  
        // echo $sql;

        $id = execute($sql);
        $sql = "SELECT * from `type` where id= $id;";
        // echo $sql;
        $result =executeResult($sql);
        // echo json_encode($result[0]);
        echo $id;
}