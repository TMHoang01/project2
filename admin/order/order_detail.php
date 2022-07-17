<?php
  require "../../database/confi.php";
  // get order in $_POST


  if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    $sql = "SELECT * from `order` where `id` = $order_id";
    $order = executeResult($sql);
    $order = $order[0];
 
    $sql = "SELECT od.*, pd.name from `order_detail` as od INNER JOIN `product` as pd on od.`product_id` = pd.`id`   where `order_id` = $order_id";
    $order_detail = executeResult($sql);
    
  }
  // echo json_encode($order_detail);
  // echo json_encode($order);
  $status = ["Đang chờ xử lý", "Đã xác nhận", "Đã hủy"];

?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>An order has been placed</title>
    <link rel="stylesheet" href="./css/order_detail.css">
</head>

<body yahoo bgcolor="#e6e6e6">

    <table class="content" bgcolor="#ffffff" align="center" cellpadding="0" cellspacing="0" border="0">
        <tbody>
            <tr>
                <td class="innerpadding borderbottom">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td class="h2">
                                    Đơn hàng #<?php echo $order['id'].': <span class="h2 color'.$order['status'].'">'.$status[$order['status']]."</span>" ;?>
                                </td>
                                <td><button class="go-back link-button">Quay lại</button></td>
                            </tr>
                            <tr>
                                <td class="bodycopy">
                                    <p>Tên khách hàng: <?php echo $order['customer_name'];?></p>
                                    <p>Địa chỉ: <?php echo $order['customer_address'];?></p>
                                    <p>Số điện thoại: <?php echo $order['customer_phone'];?></p>
                                    <p>Ngày đặt: <?php echo date("d/m/Y H:i",strtotime($order['time_order']));?></p>
                                </td>
                            </tr>
                                <!-- <tr>
                  <td class="bodycopy">
                    An order has been placed by Kenneth Paskett (<a href="mailto:kenneth.paskett@hotwaxsysetms.com">kenneth.paskett@hotwaxsystems.com</a>). Details of this order are below.
                  </td>
                </tr> -->
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="innerpadding borderbottom bodycopy">
                    <h3 class="h3">Đơn hàng chi tiết</h3>
                    <table class="table table-striped table-collapse" width="100%">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th class="text-right">Thành tiền</th>
                            </tr>
                        </thead>

                        <tbody class="">
                            <?php foreach($order_detail as $item){?>
                            <tr>
                                <td><?php echo $item['name'];?></td>
                                <td><?php echo $item['quantity'];?></td>
                                <td><?php echo number_format($item['product_price']);?> đ</td>
                                <td class="text-right">
                                    <?php echo number_format($item['product_price']*$item['quantity']);?> đ</td>
                            </tr>
                            <?php }?>
                        </tbody>



                        <tfoot class="text-right">
                            <td colspan="3" style=" padding-top: 12px;">
                                <dl class="dl-horizontal pull-right">
                                    <strong>Tổng hàng</strong><br>
                                    <strong>Phí ship</strong><br>
                                    <strong>Tổng thanh toán</strong>
                                </dl>
                            </td>
                            
                            <td style=" padding-top: 8px;">
                                <dd class="text-right"><?php echo number_format($order['price'])?> đ</dd>
                                <dd class="text-right">0 đ</dd>
                                <dd class="text-right"><?php echo number_format($order['price'])?> đ</dd>
                            </td>
                        </tfoot>

                    </table>
                </td>
            </tr>
            <?php if($order['status'] == 0){?>
            <tr>
                <td class="borderbottom">
                    <table align="center">
                        <tbody>
                            <tr>
                                <td width="95%" align="center" class="bodycopy bottompadding">
                                    <strong class="h5">Xử lí đơn</strong><br>
                                    <!-- <small>Billing Account - Payment Term: 100% 30 days</small> -->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="col-50 bodycopy bottompadding" align="center">
                                    <button class="handle-order link-button" data-status="2" data-id="<?php echo $order_id;?>" >Hủy đơn</button>
                                </td>
                                <td class="col-50 bodycopy bottompadding" align="center">
                                    <button class="handle-order link-button" data-status="1" data-id="<?php echo $order_id;?>">Xác nhận</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </td>
            </tr>
            <?php }?>

        </tbody>
    </table>

    <script src="./js/order_detail.js"></script>

</body>

</html>

