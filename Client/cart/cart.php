<?php 
 if(!isset($_SESSION)) 
{ 
    session_start(); 
}
// $cart =[];
if(isset($_SESSION['cart']))
    $cart = $_SESSION['cart'];
?>
<style>
:root {
    --white: #fff;
    --black: #222;
    --green: #6cbe02;
    --grey1: #f0f0f0;
    --grey2: #e9d7d3;
}

/* Cart Items */
.cart {
    /* margin: 10rem auto; */
    width: 100%;
}

table {
    width: 100%;
    border-collapse: collapse;
}

.cart-info {
    display: flex;
    flex-wrap: wrap;
}

th {
    text-align: left;
    padding: 0.5rem;
    color: #fff;
    background-color: var(--green);
    font-weight: normal;
}

td {
    padding: 1rem 0.5rem;
}

td input {
    width: 5rem;
    height: 3rem;
    padding: 0.5rem;
}

td .btn-delete {
    color: orangered;
    font-size: 1.4rem;
    border: none;
    background: none;
    margin-top: 12px;
}

td img {
    width: 8rem;
    height: 8rem;
    margin-right: 1rem;
}

.total-price {
    display: flex;
    align-items: flex-end;
    flex-direction: column;
    margin-top: 2rem;
}

.total-price table {
    border-top: 3px solid var(--green);
    width: 100%;
    max-width: 35rem;
}

td:last-child {
    text-align: right;
}

th:last-child {
    text-align: right;
}

.checkout {
    display: inline-block;
    background-color: var(--green);
    color: white;
    padding: 1rem;
    margin-top: 1rem;
}

.container {
    max-width: 114rem;
    margin: 0 auto;
    padding: 0 3rem;
}

@media only screen and (max-width: 567px) {
    .cart-info p {
        display: none;
    }
}

.box-cart {
    display: flex;
    padding: 1.25rem 0 3.125rem;
    margin-right: auto;
    margin-left: auto;
    width: 1200px;
}

.left-cart {
    display: block;
    width: 180px;
    flex-shrink: 0;
}

.left-cart .member-infor {
    font-size: 12px;
    line-height: 22px;
    color: #424242;
    letter-spacing: 0;
}

.left-cart .member-info>p {
    line-height: 22px;
    white-space: nowrap;
    text-overflow: ellipsis;
    width: 158px;
    display: block;
    overflow: hidden;
}

.left-cart .nav-container {
    list-style: none;
    margin: 16px 0 0;
    padding: 0;
    font-size: 16px;
    color: #424242;
    letter-spacing: 0;
    line-height: 24px;
}

.left-cart .nav-container .item {
    margin: 16px 0 0;
}

.left-cart .nav-container .item>a {
    text-decoration: none;
    color: #424242;
}

.left-cart .nav-container .item .item-container {
    list-style: none;
    margin: 0;
    padding: 0 0 0 16px;
}

.left-cart .nav-container .item .item-container .sub a {
    cursor: pointer;
    font-size: 14px;
    color: #757575;
    letter-spacing: 0;
    line-height: 22px;
    text-decoration: none;
}
</style>

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
                    <li id="Address-book" class="sub"><a href="//member.lazada.vn/address"
                            data-spm="Address-book">Địa chỉ</a></li>
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
                                // echo 'div class="cart-info">
                                //         <img src="'.$each["image"].'" alt="">
                                //         <div>
                                //             <p>'.$each["name"].'t</p>
                                //             <span>'.$each["cost"].'</span> <br>
                                //             <button class="btn-delete" data-id="'.$id.'">Xóa</button>
                                //         </div>
                                //     </div>';
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
                                            <span class="span-quatity">'.$each['quatity'].'</span>
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


                <!--             <tr>
                    <td>

                        <div class="cart-info">
                            <img src="../images/feature_1.jpg" alt="">
                            <div>
                                <p>Boy’s T-Shirt</p>
                                <span>Price: $50.00</span> <br>
                                <a href="#">remove</a>
                            </div>
                        </div>
                    </td>
                    <td><input type="number" value="1" min="1"></td>
                    <td>$50.00</td>
                </tr>
                <tr>
                    <td>
                        <div class="cart-info">
                            <img src="./images/product-3.jpg" alt="">
                            <div>
                                <p>Boy’s T-Shirt</p>
                                <span>Price: $90.00</span> <br>
                                <a href="#">remove</a>
                            </div>
                        </div>
                    </td>
                    <td><input type="number" value="1" min="1"></td>
                    <td>$90.00</td>
                </tr> -->

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
                        <td>Total</td>
                        <td><span class="total-cost"><?php echo number_format($total_cost) ;?></span></td>
                    </tr>
                </tbody>
            </table>
            <a href="#" class="checkout btn">Proceed To Checkout</a>
        </div>
        <?php } ?>
    </div>
</div>

