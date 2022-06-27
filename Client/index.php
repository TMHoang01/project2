<?php
    require_once "../database/confi.php";
    if(!isset($_SESSION)){
        session_start();
    }
?>


<html>

<head>
    <meta charset="utf-8">
    <meta content="IE-edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, intial-scale=1.0" name="viewport">
    <title>Shopping Website</title>
    <!--fav-icon---------------->
    <link rel="shortcut icon" href="images/fav-icon.png" />
    <link rel="stylesheet" href="css/style.css">
    <!--light-slider-files-->
    <!-- <link rel="stylesheet" href="css/lightslider.css"> -->
    <!--style----->
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/Jquery.js"></script>

</head>

<body>
    <?php include './root/header.php'?>

    <!--search-bar----------------------------------->
    <div class="search-bar">

        <!--search-input------->
        <div class="search-input">
            <input type="text" placeholder="Search For Product" name="search" />
            <!--cancel-btn--->
            <a href="javascript:void(0);" class="search-cancel">
                <i class="fas fa-times"></i>
            </a>

        </div>
    </div>


    <?php
        if(empty($_GET)){
            include 'root/home.php';
            // die();
        }else{
            // echo 'mama';
            if(isset($_GET['theloai'])){
                include( './layout/category.php');
            }else if(isset($_GET['cart'])){
                include('cart/cart.php');
            }else if(!empty($_GET['timkiem'])){
                include('layout/search.php');
            }
        }



    ?>




<?php //include "./root/login.php"; ?>
<?php if(empty($_SESSION["signin"])) include "./root/login.php"; ?>
<?php include "./root/footer.php"; ?>
<script type="text/javascript" src="./js/cart.js"></script>


</body>

</html>