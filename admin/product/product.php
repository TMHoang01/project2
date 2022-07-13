<?php
    require "../../database/confi.php";
    $sql = 'SELECT * FROM `product` ORDER BY `product`.`id` DESC limit 6';
    // echo $sql
    $products = executeResult($sql);

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




?>
  

<link rel="stylesheet" type="text/css" href="./css/form_product.css">



<h1 class="main-title">Sản phẩm</h1>
<!-- <h1><?php echo json_encode($sub_types); ?></h1> -->


<div class="add-new-item">

    <a class="link-button" id="btn_add_product" href="#box-popup"><i class="fas fa-plus-circle"></i>Thêm sản phẩm</a>
    <!-- <a class="link-button" id="btn_add_type" href="#box-popup" ><i class="fas fa-plus-circle"></i>Thể loại</a> -->


    <table class="styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Tên mặt hàng</th>
                <th>Gía</th>
                <!-- <th>Còn lại</th>
                <th>Đã bán</th> -->
                <th></th>
            </tr>
        </thead>
        <tbody>

            <?php
                // print_r($products);
                foreach($products as $each){
                    echo
                    '<tr>
                        <td class="id">'.$each["id"].'</td>
                        <td>
                            <img src="./image/'.$each["image"].'" alt=""
                                style="width: 100px; border-radius: 5px;">
                        </td>
                        <td class="name">'.$each["name"].'</td>
                        <td class="cost">'.number_format($each["cost"]).'</td>
                        <!-- <td>28 </td>
                        <td>6 </td> -->
                        <td>
                            <a class="link-button blue" data-id="'.$each["id"].'">Chi tiết</a>
                            <a class="link-button edit" href="#box-popup" data-id="'.$each["id"].'">Sửa</a>
                            <a class="link-button red" data-id="'.$each["id"].'">Xóa</a>
                        </td>
                    </tr>';
                }
            ?>
            <tr>
                <td>1 </td>
                <td>
                    <img src="https://sixdo.vn/images/products/2022/large/_DSC5076say.jpg" alt=""
                        style="width: 100px; border-radius: 5px;">
                </td>
                <td>Orange Sleeveless Midi Silk Dress </td>
                <td>200.000 </td>
                <!-- <td>35 </td>
                <td>9 </td> -->
                <td>
                    <a class="link-button blue" href="./view-infomation/item-information.php?id=1"> Xem chi tiet</a>
                    <a class="link-button" href="./edit/edit_product.php?id=1"> Sua</a>
                    <a onclick="return confirm('Xac nhan xoa ?')" class="link-button red" href="?delete=1"> Xoa</a>
                </td>
            </tr>


        </tbody>
    </table>

<!--     <div class="page_number_list">
        <div class="page_number">
            <a href="?page=1&amp;search=">1</a>
        </div>

        <div class="page_number">
            <a href="?page=2&amp;search=">2</a>
        </div>
    </div> -->

</div>



<div class="show-form"></div>
<script>
    var sub_type = <?php echo json_encode($sub_types); ?>;
    // console.log(sub_type);
</script>

<script type="text/javascript" src="./js/product.js">

</script>