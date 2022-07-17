<?php
require "../../database/confi.php";
// change status of order
if (isset($_GET['status'])) {
    $status = $_GET['status'];
    $id = $_GET['id'];
    $sql = "UPDATE `order` SET status = $status WHERE id = $id";
    execute($sql);
    // echo $sql;
    echo $status;

}