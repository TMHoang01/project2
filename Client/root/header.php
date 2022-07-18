<?php 
 if(!isset($_SESSION)) 
{ 
    session_start(); 
}
?>
<nav>
    <!--social-links-and-phone-number----------------->
    <div class="social-call">
        <!--social-links--->
        <div class="social">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
        <!--phone-number------>
        <div class="phone">
            <span>Call: +123456789</span>
        </div>
    </div>
    <!--menu-bar----------------------------------------->
    <div class="navigation">
        <!--menu-icon------------->
        <div class="toggle"></div>
        <!--logo------------>
        <a href="./index.php" class="logo"><img src="./images/logo.png"></a>
        <!--menu----------------->
        <ul class="menu">
            <li><a href="./index.php">Home</a></li>
            <!-- <li class="shop"><a href="#">Shop</a></li> -->
            <li><a href="category.php?theloai=1">Áo</a></li>
            <li><a href="category.php?theloai=2">Quần</a></li>
            <li><a href="category.php?theloai=3">Phụ kiện</a></li>
        </ul>
        <!--right-menu----------->
        <div class="right-menu">
            <li> <a href="javascript:void(0);" class="search">
                    <i class="fas fa-search"></i>
                </a>
            </li>
            <li><a href="./index.php?cart">
                    <i class="fas fa-shopping-cart">
                        <span class="num-cart-product"><?php echo isset($_SESSION['cart'])? count($_SESSION['cart']):0  ?></span>
                    </i>
                </a></li>
            <?php
             		if(isset($_SESSION['user']['signin'])){
             			if($_SESSION['user']['signin']){
             				echo '<li  class="user-signin">
				                    <i class="fa fa-angle-down"></i>
                                    <div class="sub-user">
                                        <div>Chao <strong>'.$_SESSION['user']["name_user"].'</strong></div>
                                        <a href="?cart">Don hang</a>
                                        <a href="./user/logout.php">Dang xuat</a>
                                    </div>
				                </li>';
             			}
             		}else{
             				echo '<li><a href="javascript:void(0);" class="user">
			                    <i class="far fa-user"></i>
			                </a></li>';
             		}
             	?>

        </div>
    </div>
</nav>