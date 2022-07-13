<?php
    require "../../database/confi.php";

    if(isset($_POST)){
        // echo json_encode($_POST);
        // echo json_encode($_FILES["upload_img"]);
        $info = $_POST;
        $cost = $_POST['cost_product'];
        $id = $_POST['id_product'];
        $name = $_POST['name_product'];
        $type = $_POST['sub_type_product'];
        $description = $_POST['description_product'];
        $file_name = '';



        if(!empty($_POST['id_product'])){
        //  update product
            // if(!empty($_POST['image_product'])){
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
                        
                        $link_img = '../image/'.$_POST['image_product'];
                        if (file_exists($link_img)) {
                            unlink($link_img);
                        }else{
                            echo "not link";
                            echo $link_img;
                        }

                    }else{
                        $file_name = $_POST['image_product'];
                    }   
                }

            // }
            $info['image_product'] =$file_name;
            $sql = "UPDATE `product`  
                SET name = '$name',
                    cost = $cost,
                    type_id = $type,
                    description = '$description',
                    image = '$file_name'
                where id= $id;";
            // echo $sql;
            
                execute($sql);
                echo json_encode($info);
                
            

        }



    }else{
        echo "lol";
    }