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
    <link rel="shortcut icon" href="./images/fav-icon.png" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/product.css">

    <!--style----->
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/Jquery.js"></script>

</head>

<body>
    <?php include './root/header.php'?>
    <div class="container">
        <!-- Left Column / Headphones Image -->
        <div class="left-column">
            <img data-image="black" src="https://s.fotorama.io/1.jpg" alt="">
            <img data-image="blue" src="https://s.fotorama.io/1.jpg" alt="">
            <img data-image="red" class="active" src="https://s.fotorama.io/1.jpg" alt="">
        </div>


        <!-- Right Column -->
        <div class="right-column">

            <!-- Product Description -->
            <div class="product-description">
                <span>Headphones</span>
                <h1>Beats EP</h1>
                <p>The preferred choice of a vast range of acclaimed DJs. Punchy, bass-focused sound and high isolation.
                    Sturdy headband and on-ear cushions suitable for live performance</p>
            </div>

            <!-- Product Configuration -->
            <div class="product-configuration">

                <!-- Product Color -->
                <div class="product-color">
                    <span>Color</span>

                    <div class="color-choose">
                        <div>
                            <input data-image="red" type="radio" id="red" name="color" value="red" checked>
                            <label for="red"><span></span></label>
                        </div>
                        <div>
                            <input data-image="blue" type="radio" id="blue" name="color" value="blue">
                            <label for="blue"><span></span></label>
                        </div>
                        <div>
                            <input data-image="black" type="radio" id="black" name="color" value="black">
                            <label for="black"><span></span></label>
                        </div>
                    </div>

                </div>

                <!-- Cable Configuration -->
                <div class="cable-config">
                    <span>Cable configuration</span>

                    <div class="cable-choose">
                        <button>Straight</button>
                        <button>Coiled</button>
                        <button>Long-coiled</button>
                    </div>

                    <a href="#">How to configurate your headphones</a>
                </div>
            </div>

            <!-- Product Pricing -->
            <div class="product-price">
                <span>148$</span>
                <a href="#" class="cart-btn">Add to cart</a>
            </div>
        </div>
    </div>


    <?php include './root/footer.php'?>



</body>

</html>