<?php
require '../../database/confi.php';
// items in cart
if(!isset($_SESSION)){
    session_start();
}
$cart = $_SESSION['cart'];
$total_cost = 0;
if(!empty($cart)){
    foreach( $cart as $id => $each){
        $cost_item = $each["cost"]*$each["quatity"];
        $total_cost += $cost_item;
        
    }
    echo $total_cost;
    // get POST

    if(isset($_POST)){
        
        $customer_name = $_POST['name'];
        $customer_phone = $_POST['phone'];
        $customer_address = $_POST['address'];
        $price = $_POST['price'];
        $time_order	 = date("Y-m-d H:i:s");
        $status = 0;
        $sql = "INSERT INTO `order` (customer_name, customer_phone, customer_address, price, time_order	, status) 
                VALUES ('$customer_name', '$customer_phone', '$customer_address', $total_cost, '$time_order	', $status)";
        echo $sql;
        $order_id = execute($sql);
        // if($order_id){
            foreach( $cart as $id => $each){
                $sql = "INSERT INTO `order_detail` (order_id, product_id, quantity, product_price) VALUES ($order_id, $id, $each[quatity], $each[cost])";
                execute($sql);
                // echo $sql;
            }
            unset($_SESSION['cart']);
            
}else{
    echo "0";
}
