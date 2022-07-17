<?php
define('HOST', 'localhost');
define('DATABASE', 'project2');
define('USERNAME', 'root');
define('PASSWORD', '');

//ket noi
function connect(){
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD,DATABASE)  or die("Lỗi kết nối tới cơ sở dữ liệu");
    mysqli_set_charset($conn,'utf8');
    // echo mysqli_error($connect);
    return $conn;
}

// them, sua, xoa 
function execute($sql){
    // mo ket noi
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD,DATABASE)  or die("Lỗi kết nối tới cơ sở dữ liệu");
    mysqli_set_charset($conn,'utf8');

    //querry
    mysqli_query($conn,$sql);
    $id =  mysqli_insert_id($conn);

    //dong ket noi
    mysqli_close($conn);
    return $id;
}

// querry lay du lieu ra
function executeResult($sql){
    $data = null;

    // mo ket noi
    $conn = mysqli_connect(HOST,USERNAME, PASSWORD, DATABASE) or die("Lỗi kết nối tới cơ sở dữ liệu");
    mysqli_set_charset($conn,'utf8');

    //querry
    $resultset = mysqli_query($conn,$sql);
    if (!$resultset) {
        printf("Error: %s\n", mysqli_error($conn));
    exit();
    }
    $rows = array();
    while($r = mysqli_fetch_array($resultset)) {
        $rows[] = $r;
    }
    mysqli_close($conn);
        // return $data;
        
    return $rows;

}

function getSingleResuslt($sql){

    $conn = mysqli_connect(HOST,USERNAME, PASSWORD, DATABASE) or die("Lỗi kết nối tới cơ sở dữ liệu");
    mysqli_set_charset($conn,'utf8');
    $resultset = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($resultset);
    return $row;
}

function getNumRows($sql){

    $conn = mysqli_connect(HOST,USERNAME, PASSWORD,DATABASE);
    mysqli_set_charset($conn,'utf8');
    $result= mysqli_query($conn,$sql);
    //$count = mysqli_num_rows($result);
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );
    mysqli_close($conn);
    //return $count;
    return $rowcount;
}

