<?php 
 if(!isset($_SESSION)) 
{ 
    session_start(); 
}
// $cart =[];
if(isset($_SESSION['cart']))
    $cart = $_SESSION['cart'];
?>

<link rel="stylesheet" href="./css/cart.css">
<link rel="stylesheet" href="./css/form_info_order.css">
<div class="box-cart">
    <div class="left-cart">
        <div class="member-info">
            <p><span>Xin chao,&nbsp;</span><br>
                <strong><span>
                        <?php   if(isset($_SESSION['name_user'])) echo $_SESSION['name_user']; ?>
                    </span></strong>
            </p>
        </div>
        <ul class="nav-container">
            <li class="item" id="Manage-My-Account"><a href="//member.lazada.vn/user/profile#/"
                    data-spm="Manage-My-Account"><span>Quản lý tài khoản</span></a>
                <ul class="item-container">
                    <li id="My-profile" class="sub"><a href="//member.lazada.vn/user/profile#/profile/my"
                            data-spm="My-profile">Thông tin</a></li>
                    <li id="Address-book" class="sub"><a href="//member.lazada.vn/address" data-spm="Address-book">Địa
                            chỉ</a></li>
                    <li id="Payment-methods" class="sub"><a
                            href="https://pages.lazada.vn/wow/i/vn/member/payment-desktop?hybrid=1"
                            data-spm="Payment-methods">Đổi mật khẩu</a></li>
                </ul>
            </li>

            <li class="item" id="My-Orders"><a class="active" href="//my.lazada.vn/customer/order/index/"
                    data-spm="My-Orders"><span>Đơn hàng</span></a>
                <ul class="item-container">
                    <li id="Returns" class="sub"><a href="//my.lazada.vn/customer/returns/index?requestType=return"
                            data-spm="Returns">Đang duyệt</a></li>
                    <li id="Cancellations" class="sub"><a>Lịch sử</a></li>
                </ul>
            </li>

        </ul>
    </div>
    <div class="container cart">
        <?php
            if((!isset($_SESSION['cart']) || empty($_SESSION['cart']))){
                echo "<h2> Khong co san pham nao</h2>";
                // echo json_encode($_SESSION['cart']);
            }else{


        ?>
        <table>
            <tbody>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
                <?php   
                    if(!empty($cart)){
                            $total_cost = 0;
                            foreach( $cart as $id => $each){

                                $cost_item = $each["cost"]*$each["quatity"];
                                $total_cost += $cost_item;
                                $each["image"] = "../admin/image/".$each["image"];
                                echo '<tr>
                                        <td>
                                            <div class="cart-info">
                                                <img src="'.$each["image"].'" alt="">
                                                <div>
                                                    <p>'.$each["name"].'t</p>
                                                    <span class="span-cost">'.number_format(    $each["cost"]).'</span> <br>
                                                    
                                                    <button class="btn-delete" data-id="'.$id.'">Xóa</button>
                                                </div>
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <button class="btn-update-quatity" data-id="'.$id.'" data-type="sub">-</button>
                                            <span class="span-quatity"  data-id="'.$id.'">'.$each['quatity'].'</span>
                                            <button class="btn-update-quatity" data-id="'.$id.'" data-type="add">+</button>
                                        </td>
                                        <td>
                                            <span class="span-sum">'.number_format($cost_item).'</span>
                                        </td>
                                    </tr>';
                                             // <input type="number" value="1" min="1">

                            }
                        }
                        ?>



            </tbody>
        </table>
        <div class="total-price">
            <table>
                <tbody>
                    <!-- <tr>
                        <td>Subtotal</td>
                        <td>$200</td>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td>$50</td>
                    </tr> -->
                    <tr>
                        <td>Chi phí</td>
                        <td><span class="total-cost"><?php echo number_format($total_cost) ;?></span></td>
                    </tr>
                </tbody>
            </table>
            <!-- <button class="checkout btn" id="btn-create-order">Đặt hàng</button> -->
        </div>

        <div class="container-form-info-order">
                <!-- <div class="title">
                    <h2>Product Order Form</h2>
                </div> -->
                <div class="d-flex">
                    <form action="" method="">
                        <label>
                            <span class="fname">Tên <span class="required">*</span></span>
                            <input type="text" name="name">
                        </label>
                        <label>
                            <span class="lname">Điện thoại <span class="required">*</span></span>
                            <input type="text" name="phonenumber">
                        </label>
                        <!-- <label>
                            <span>Company Name (Optional)</span>
                            <input type="text" name="cn">
                        </label> -->

                        <label>
                            <span>Địa chỉ <span class="required">*</span></span>
                            <input type="text" name="address" placeholder="House number and street name" required>
                        </label>


                
                    </form>
                    <div class="Yorder">
                        <table>
                            <!-- <tr>
                                <th colspan="2">Hóa đơn</th>
                            </tr> -->
                            <tr>
                                <td>Phí ship</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>Tổng</td>
                               <td><span class="total-cost" id = "price"><?php echo number_format($total_cost) ;?></span></td>
                               
                            </tr>
                            <!-- <tr>
                                <td>Subtotal</td>
                                <td>$88.00</td>
                            </tr> -->
                           
                        </table><br>

                        <button type="button"  id="btn-create-order">Đặt hàng</button>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<script>
    // check empty form order  and create order
    $(document).ready(function(){
        console.log("create order");
        $("#btn-create-order").click(function(){
            var name = $("input[name='name']").val();
            var phonenumber = $("input[name='phonenumber']").val();
            var address = $("input[name='address']").val();
            var price = $("#price").text();
            var cart = <?php echo json_encode($cart); ?>;
            if(name == "" || phonenumber == "" || address == ""){
                alert("Vui lòng nhập đầy đủ thông tin");
            }else{
                $.ajax({
                    url: "./cart/create_order.php",
                    type: "POST",
                    data: {
                        name: name,
                        phone: phonenumber,
                        address: address,
                        price: price,
                    },
                    success: function(data){
                        console.log(data);
                        // location index.php
                        location.href = "./index.php";
                    }
                });
            }
        });
    });

</script>

