<?php
require '../../database/confi.php';
// items in cart
if(!isset($_SESSION)){
    session_start();
}
$cart = $_SESSION['cart'];
// check session id_user and set customer_id
    $customer_id = (isset($_SESSION['user']['id_user']) ? $_SESSION['user']['id_user'] : 'NULL');

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
        $_SESSION['user']['phone_user'] = $customer_phone;
        $_SESSION['user']['address_user'] = $customer_address;
        $price = $_POST['price'];
        $time_order	 = date("Y-m-d H:i:s");
        $status = 0;
        
        $sql = "INSERT INTO `order` (customer_id, customer_name, customer_phone, customer_address, price, time_order	, status) 
                VALUES ($customer_id, '$customer_name', '$customer_phone', '$customer_address', $total_cost, '$time_order', $status)";
        echo $sql;
        $order_id = execute($sql);
        foreach( $cart as $id => $each){
            $sql = "INSERT INTO `order_detail` (order_id, product_id, quantity, product_price) VALUES ($order_id, $id, $each[quatity], $each[cost])";
            execute($sql);
        }

        unset($_SESSION['cart']);
            
    }
}else{
    echo "0";
}