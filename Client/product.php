<?php
    require_once "../database/confi.php";
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset( $_GET["product"] )){
        $id = $_GET["product"];
        $sql = "SELECT * from `product` where id = $id";
        $product = executeResult($sql)[0];
        // print_r($sql);
        if(empty($product)) header("location:./");
    }
?>


<html>

<head>
    <meta charset="utf-8">
    <meta content="IE-edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, intial-scale=1.0" name="viewport">
    <title>Shopping Website</title>
    <!--fav-icon---------------->
    <link rel="shortcut icon" href="./images/fav-icon.png" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/product1.css">

    <!--style----->
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/Jquery.js"></script>

</head>

<body>
    <?php include './root/header.php'?>

    <div class="card-wrapper">
        <div class="card">
            <!-- card left -->
            <div class="product-imgs">
                <div class="img-display">
                    <div class="img-showcase">
                        <img src="<?php  echo "../admin/image/".$product['image']; ?>"
                            alt="shoe image">

                    </div>
                </div>

            </div>
            <!-- card right -->
            <div class="product-content">
                <h2 class="product-title"><?php echo $product['name'] ?> </h2>
                <!-- <a href="#" class="product-link">visit nike store</a> -->
                <div class="product-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <span>4.7(21)</span>
                </div>

                <div class="product-price">
                    <!-- <p class="last-price">Old Price: <span>$257.00</span></p> -->
                    <h2 class="new-price">Gi??: <span><?php echo number_format( $product['cost']) ?> ??</span></h2>
                </div>

                <div class="product-detail">
                    <h4>Th??ng tin s???n ph???m: </h4>
                    <p><?php echo str_replace(array("\r\n", "\n", "\r"),'<br>',$product['description']); ?></p>
                    <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, perferendis eius.
                        Dignissimos, labore suscipit. Unde.</p> -->
                    <!-- <ul>
                        <li>Color: <span>Black</span></li>
                        <li>Available: <span>in stock</span></li>
                        <li>Category: <span>Shoes</span></li>
                        <li>Shipping Area: <span>All over the world</span></li>
                        <li>Shipping Fee: <span>Free</span></li>
                    </ul> -->
                </div>

                <div class="purchase-info">
                    <!-- <input type="number" min="0" value="1"> -->
                    <button type="button" class="btn" data-id="<?php echo $product['id']; ?>">
                        Th??m v??o gi??? h??ng <i class="fas fa-shopping-cart"></i>
                    </button>
                    <!-- <button type="button" class="btn">Compare</button> -->
                </div>

                <div class="social-links">
                    <p>Share At: </p>
                    <a href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-pinterest"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php include './root/footer.php'?>
    <script>
        $(document).ready(function($) {
        $("button.btn").click(function(event) {
            /* Act on the event */
            let id = $(this).data('id');
            // setTimeout(function(){
                alert("???? th??m s???n ph???m v??i gi??? h??ng");
            // }, 2000);
            $.ajax({
                    url: './cart/add_to_cart.php',
                    type: 'GET',
                    dataType: 'html',
                    data: { id },
                })
                .done(function(data) {
                    console.log("product in cart"+ data);
                    $('num-cart-product').text(data);

                })
                .fail(function() {
                    console.log("error");
                })


        });
    });
    </script>

    
</body>

</html>