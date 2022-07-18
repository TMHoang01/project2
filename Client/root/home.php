<?php
// require "../database/confi.php";
$sql = "SELECT * from `product` limit 8";
$products = executeResult($sql);


?>
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
<!---           sale------------------------------------>
<!-- <section class="sale">
    sale-box-1------------------
    <div class="sale-box sale-1">
        <img src="images/sale-1.jpg">
        <a href="#">
            <div class="sale-text">
                <strong>Bag with rose pattern</strong>
                <span>Sale off 25%</span>
            </div>
        </a>
    </div>
</section> -->



<!--              Feature-items-------------------------------->
<section class="feature-item">

    <!--heading-------->
    <div class="feature-heading">
        <strong><a href="category.php?theloai=1">Áo</a></strong>
    </div>
    <!--products----------------------->
    <div class="product-container">
        <div> </div>
        <?php   
                $sql = "SELECT `product`.* from `product`
                        inner join `type` on `product`.`type_id` = `type`.`id`
                        where `type`.`id_parent` = 1
                        order by `product`.`id` DESC  limit 8";
                $products = executeResult($sql);
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

<section class="feature-item">

    <!--heading-------->
    <div class="feature-heading">
    <strong><a href="category.php?theloai=2">Quần</a></strong>
    </div>
    <!--products----------------------->
    <div class="product-container">
        <div> <?php// echo $sql ?></div>
        <?php   
                $sql = "SELECT `product`.* from `product`
                        inner join `type` on `product`.`type_id` = `type`.`id`
                        where `type`.`id_parent` = 2
                        order by `product`.`id` DESC  limit 8";

                $products = executeResult($sql);
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