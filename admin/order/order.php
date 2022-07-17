<?php 
    require "../../database/confi.php";
    $page = 0;
    if (isset($_GET['page'])) {
        $page = $_GET['page'] - 1;
    }
    $limit = 5;
    $start = $page * $limit;
    $sql = "SELECT * from `order` ";
    if(isset($_GET['hide'])){
        $hide = $_GET['hide'];
        if($hide == 1){
            $sql .= "WHERE status = 0";
            $limit = 100;
        }
        
    }

    $sql = $sql." ORDER BY id DESC LIMIT $start, $limit";
    // echo "<br>".$sql;
    $orders = executeResult($sql);

    

?>
<h1 class="main-title">Danh sách đơn hàng</h1>

<div class="add-new-item">
   
    <a class="link-button" id="hide"><i class="fas fa-calendar-times"></i>Ẩn tất cả đơn đã hoàn thành</a>

    <table class="styled-table">
        <thead>
            <tr>

                <th>ID</th>
                <th>Tên người nhận</th>
                <th>Sđt người nhận</th>
                <th>Địa chỉ</th>
                <th>Giá</th>
                <th>Quản lí</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $each) { ?>
                <tr>
                    <td><?php echo $each['id'] ?></td>
                    <td><?php echo $each['customer_name'] ?></td>
                    <td><?php echo $each['customer_phone'] ?></td>
                    <td><?php echo $each['customer_address'] ?></td>
                    <td><?php echo number_format($each['price']) ?> đ</td>
                    <td>
                        <a class="link-button show-order" data-id="<?php echo $each['id'] ?>"><i class="fas fa-eye"></i>Chi tiết</a>
                        <!-- <a class="link-button" href="?delete=true&id=<?php// echo $each['id'] ?>"><i class="fas fa-trash-alt"></i>Xóa</a> -->
                    </td>
                </tr>
            <?php } ?>


            <!-- <tr>
                <td><a>24</a></td>
                <td><a>ecec</a></td>
                <td><a>0123456789</a></td>
                <td><a>Ec ec</a></td>
                <td><a>
                        Chờ duyệt đơn </a>
                </td>
                <td>
                    <a class="link-button"><i class="fas fa-check"></i>Duyệt</a>
                    <a class="link-button"><i class="fas fa-times"></i>Hủy</a>
                </td>
            </tr> -->




        </tbody>
    </table>

    <div class="page_number_list">
        <?php
        $sql = "SELECT * from `order`";
        $total_rows = count(executeResult($sql));
        $total_pages = ceil($total_rows / $limit);
        for ($i = 1; $i <= $total_pages; $i++) {
            echo '<div class="page_number"><a  data-page="' . $i . '">' . $i . '</a></div>';
        }
        ?>


        <!-- <div class="page_number">
            <a href="?page=1&amp;search=">1</a>
        </div>

        <div class="page_number">
            <a href="?page=2&amp;search=">2</a>
        </div>

        <div class="page_number">
            <a href="?page=3&amp;search=">3</a>
        </div> -->

    </div>

</div>

<script src="./js/order.js">
</script>