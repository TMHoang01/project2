<?php
    require_once "../database/confi.php";
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_GET['theloai'])){
        $theloai = $_GET['theloai'];
        $sql = "SELECT `product`.* from `product`
        inner join `type` on `product`.`type_id` = `type`.`id`
        where `type`.`id_parent` = $theloai
        order by `product`.`id` DESC ";
       
        
    }else{
        // back into home page
        header('Location: ./index.php');
    }
    $trang = 1;
    if(isset($_GET['trang'])){
        $trang = $_GET['trang'];
    }
    $so_san_pham_tren_1_trang = 12;
    $from = ($trang - 1) * $so_san_pham_tren_1_trang;
    $sql .= " LIMIT $from, $so_san_pham_tren_1_trang";
    $products = executeResult($sql);
    $name_type = ["","Áo","Quần","Phụ kiện"];
?>


<html>

<head>
    <meta charset="utf-8">
    <meta content="IE-edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, intial-scale=1.0" name="viewport">
    <title>Shopping Website</title>
    <!--fav-icon---------------->
    <link rel="shortcut icon" href="images/fav-icon.png" />
    <link rel="stylesheet" href="./css/style.css">
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


    <!--product-categories-slider---------------------->
<ul id="autoWidth" class="container" class="cs-hidden">
    <!--box-1--------------------->
    <li class="item">
        <div class="feature-box">
            <a href="#">
                <img src="images/feature_1.jpg">
            </a>
        </div>
        <span>T-Shirts</span>
    </li>
    <!--box-2--------------------->
    <li class="item">
        <div class="feature-box">
            <a href="#">
                <img src="images/feature_2.jpg">
            </a>
        </div>
        <span>Men T-Shirts</span>
    </li>
    <!--box-3--------------------->
    <li class="item">
        <div class="feature-box">
            <a href="#">
                <img src="images/feature_3.jpg">
            </a>
        </div>
        <span>Kids T-Shirts</span>
    </li>
    <!--box-4--------------------->
    <li class="item">
        <div class="feature-box">
            <a href="#">
                <img src="images/feature_4.jpg">
            </a>
        </div>
        <span>Pillow</span>
    </li>
    <!--box-5--------------------->
    <li class="item">
        <div class="feature-box">
            <a href="#">
                <img src="images/feature_5.jpg">
            </a>
        </div>
        <span>Phone Cover</span>
    </li>
    <!--box-6--------------------->
    <li class="item">
        <div class="feature-box">
            <a href="#">
                <img src="images/feature_6.jpg">
            </a>
        </div>
        <span>Shopping Bags</span>
    </li>

</ul>

<!--           banner-->
<div class="banner-box f-slide-3">

    <div class="banner-text-container">
        <div class="banner-text">
            <span>Limited Offer</span>
            <strong>30% Off<br /> With <font>Promo Code</font></strong>
            <a href="#" class="banner-btn">Shop Now</a>
        </div>
    </div>

</div>

<!--              Feature-items-------------------------------->
<section class="feature-item">

    <!--heading-------->
    <div class="feature-heading">
        <strong><?php echo $name_type[$theloai] ?></strong>
    </div>
    <!--products----------------------->
    <div class="product-container">
        <div> </div>
        <?php   

                foreach($products as $item){
                    $item['image'] = '../admin/image/'.$item['image'];
                    echo '<div class="product-box">
                        <div class="product-img">
                            <div  class="add-cart" data-id="'.$item["id"].'"><i class="fas fa-shopping-cart"></i></div>
                            <a href="./product.php?product='.$item["id"].'" class="p-name"><img src="'.$item["image"].'"></a>
                        </div>
                        <div class="product-details">
                            <a href="./product.php?product='.$item["id"].'" class="p-name">'.$item["name"].'</a>
                            <span class="p-price">'.number_format($item["cost"]).'</span>
                        </div>
                    </div>';
                }
            ?>
    </div>
</section>

<!--pagination---------------------->
<section>
<div class="pagination">
    <?php
        $sql = "SELECT `product`.* from `product`
        inner join `type` on `product`.`type_id` = `type`.`id`
        where `type`.`id_parent` = $theloai";
        $products = executeResult($sql);
        $tong_so_san_pham = count($products);
        $so_trang = ceil($tong_so_san_pham / $so_san_pham_tren_1_trang);
        for($i = 1; $i <= $so_trang; $i++){
            echo '<a href="?theloai='.$theloai.'&trang='.$i.'">'.$i.'</a>';
        }
         
    ?>

</div>
</section>





<?php //include "./root/login.php"; ?>
<?php if(empty($_SESSION["signin"])) include "./root/login.php"; ?>
<?php include "./root/footer.php"; ?>
<script type="text/javascript" src="./js/cart.js"></script>

<script>

</script>
</body>

</html>