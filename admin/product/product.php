<?php
    require "../../database/confi.php";
    $sql = 'SELECT * FROM `product` ORDER BY `product`.`id` DESC';
    // pagination
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 6;
    $start = ($page - 1) * $limit;
    $sql = $sql . " limit $start, $limit";


    $products = executeResult($sql);

    // $sql = "SELECT * from `type` ";
    // $types = executeResult($sql);
    // $sub_types = [];
    // foreach ($types as $type) {
    //     if($type['id_parent'] == 0){
    //         $sub_types[$type['id']] = $type['name'];
    //         $sub_types[$type['id']] = [];
    //     }else{
    //         $sub_types[$type['id_parent']][] = $type['id'];
    //     } 
    // }




?>
  

<link rel="stylesheet" type="text/css" href="./css/form_product.css">



<h1 class="main-title">Sản phẩm</h1>
<!-- <h1><?php echo json_encode($sub_types); ?></h1> -->


<div class="add-new-item">

    <a class="link-button" id="btn_add_product" ><i class="fas fa-plus-circle"></i>Thêm sản phẩm</a>
    <!-- <a class="link-button" id="btn_add_type"  ><i class="fas fa-plus-circle"></i>Thể loại</a> -->


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
                            
                            <a class="link-button edit" data-id="'.$each["id"].'">Sửa</a>
                            <a class="link-button red" data-id="'.$each["id"].'">Xóa</a>
                        </td>
                    </tr>';
                }
            ?>



        </tbody>
    </table>

    <div class="page_number_list">
        <?php
        $sql = "SELECT * from `product`";
        $total_rows = count(executeResult($sql));
        $total_pages = ceil($total_rows / $limit);
        for ($i = 1; $i <= $total_pages; $i++) {
            echo '<div class="page_number"><a  data-page="' . $i . '">' . $i . '</a></div>';
        }
        ?>

    </div>

</div>



<div class="show-form"></div>
<script>
    $(document).ready(function() {
        $('.page_number a').click(function() {
            $('.page_number a').removeClass('active');
            var page = $(this).data('page');
            $.ajax({
                url: './product/product.php',
                type: 'GET',
                data: {
                    page: page
                },
                success: function(data) {
                    $('.container-main').html(data);
                }
            });
        });
    });
</script>
<script type="text/javascript" src="./js/product.js">

</script>