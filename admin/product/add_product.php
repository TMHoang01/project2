<?php
    require "../../database/confi.php";

    if(isset($_POST)){
        // echo json_encode($_POST);
        // echo json_encode($_FILES["upload_img"]);
        $info = $_POST;
        $cost = $_POST['cost_product'];
        $id = $_POST['id_product'];
        $name = $_POST['name_product'];
        $type = $_POST['type_product'];
        $description = $_POST['description_product'];
        $file_name = '';

        if(empty($_POST['id_product'])){
        // add product
            if(isset($_FILES["upload_img"])){
                // var_dump($_FILES["upload_img"]);
                if(!empty($_FILES["upload_img"]["name"])){
                    $product_image = $_FILES["upload_img"];
                    // echo json_encode($_FILES["upload_img"]);
                    $folder = '../image/';
                    $file_extension = '.' .explode('.',$product_image['name'])[1];                   
                    $file_name =  time() .  $file_extension;
                    $path_file = $folder . $file_name;
                    move_uploaded_file($product_image['tmp_name'], $path_file);                    
                }else{echo "not img";}    
            }
    
                $sql = "INSERT into `product` (name,cost,description,image,type_id)
                values('$name',$cost,'$description','$file_name',$type)";  
            // echo $sql;
            if(empty($cost) || empty($name) || empty($type) || empty($file_name) || empty($cost)  ) {
                // echo "thieu thong tin ";
                return false;
            }else{
                $id = execute($sql);
                $sql = "SELECT * from `product` where id= $id;";
                // echo $sql;
                $result =executeResult($sql);
                echo json_encode($result[0]);
                // echo $id;
            }

        }

    }else{
        echo "lol";
    }