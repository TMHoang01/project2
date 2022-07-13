<?php
    require "../../database/confi.php";
    $sql = 'SELECT * FROM `product` ORDER BY `product`.`id` DESC limit 6';
    // echo $sql
    $products = executeResult($sql);
    $sql = "SELECT * from `type` ";
    $types = executeResult($sql);
    $sub_types = [];
    // if $types['id_parent'] == 0 then $sub_types[$types['id']] = $types['name']; else $sub_types[$types['id_parent']][$types['id']] = $types['name'];
    // ad sub type in json format
    $sub_types = [];
    foreach ($types as $type) {
        if($type['id_parent'] == 0){
            $sub_types[$type['id']] = $type['name'];
            $sub_types[$type['id']] = [];
        }else{
            $sub_types[$type['id_parent']][] = $type['id'];
        } 
    }
        // foreach ($types as $type) {
        //     if($type['id_parent'] == 0){
        //         $sub_types[$type['id']] = $type['id'];
        //     }else{
        //         $sub_types[$type['id_parent']] = $type['id'];
        //     }
        // }

    // echo $sub_types[1][4];
    echo json_encode($sub_types);



?>
  



<!-- <link rel="stylesheet" type="text/css" href="../css/form_type_product.css">
<dl class="left-nav ready">
    <dt><div>Category</div></dt>
    <dd>
        <ul>
            <li>Subcategory</li>
            <li>Subcategory</li>
            <li>Subcategory</li>
        </ul>
    </dd>
    <dt><div>Category</div></dt>
    <dd>
        <ul>
            <li>Subcategory</li>
            <li>Subcategory</li>
            <li>Subcategory</li>
        </ul>
    </dd>
    <dt><div>Category</div></dt>
    <dd>
        <ul>
            <li>Subcategory</li>
            <li>Subcategory</li>
            <li>Subcategory</li>
        </ul>
    </dd>
</dl>
<script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>


<script>
    $('dt').on('click', function() {
        $('dl').children('dt').removeClass('active');
        $(this).addClass('active');
    })
</script> -->