<?php
// get id and delete type
require "../../database/confi.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE from `type` where id= $id;";
    execute($sql);
    // echo json_encode($sql);
    echo $id;
}