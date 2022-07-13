<?php
require "../../database/confi.php";
//edit name type product
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $name = $_GET["name"];
    $id_parent = $_GET["id_parent"];
    $sql = "UPDATE `type` 
        SET `type`.`name` = '$name'
        WHERE `type`.`id` = $id;";
    execute($sql);
    echo $sql;

}