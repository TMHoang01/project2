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
                <!-- <div class="img-select">
                    <div class="img-item">
                        <a href="#" data-id="1">
                            <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_1.jpg"
                                alt="shoe image">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="#" data-id="2">
                            <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_2.jpg"
                                alt="shoe image">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="#" data-id="3">
                            <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_3.jpg"
                                alt="shoe image">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="#" data-id="4">
                            <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_4.jpg"
                                alt="shoe image">
                        </a>
                    </div>
                </div> -->
            </div>
            <!-- card right -->
            <div class="product-content">
                <h2 class="product-title"><?php echo $product['name'] ?> </h2>
                <a href="#" class="product-link">visit nike store</a>
                <div class="product-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <span>4.7(21)</span>
                </div>

                <div class="product-price">
                    <p class="last-price">Old Price: <span>$257.00</span></p>
                    <p class="new-price">New Price: <span>$249.00 (5%)</span></p>
                </div>

                <div class="product-detail">
                    <h2>about this item: </h2>
                    <p><?php print_r($product['description']); ?></p>
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
                        Thêm vào giỏ hàng <i class="fas fa-shopping-cart"></i>
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
                alert("Đã thêm sản phẩm vài giỏ hàng").fadeOut('slow');
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
    <!-- <script>
        const imgs = document.querySelectorAll('.img-select a');
        const imgBtns = [...imgs];
        let imgId = 1;

        imgBtns.forEach((imgItem) => {
            imgItem.addEventListener('click', (event) => {
                event.preventDefault();
                imgId = imgItem.dataset.id;
                slideImage();
            });
        });

        function slideImage() {
            const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

            document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
        }

        window.addEventListener('resize', slideImage);
    </script> -->
    
</body>

</html>