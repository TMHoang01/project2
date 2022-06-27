<?php 
    // if(!isset($_SESSION)) 
    // { 
    //     session_start(); 
    // }
    // if(isset($_GET['signout'])){
    //   unset($_SESSION["loged"]);
    //   header('location:login.php');
    // }
    // if(isset($_GET['removeaccount'])){
    //   session_destroy();
    //   setcookie('token', "null", -1,'/','',0);
    //   header('location:login.php');
    // }
  ?>

<div class="sidebar-menu">

    <div class="sidebar-header">
        <!-- <img src="https://i.ibb.co/6bZRxw4/P-ogrange.png" alt="" class="menu-logo" /> -->

        <p class="menu-webname">LOGO</p>

    </div>

    <ul class="menu">
        <li class="menu-item" id="dashbroad">
            <!-- <a href="./index.php" class="menu-link"> -->
              <i class="far fa-eye"></i> <span>Tổng quan</span> 
            <!-- </a> -->
        </li>
        <li class="menu-item" id="product">
              <i class="fas fa-shopping-cart"></i> <span>Sản phẩm</span>
        </li>
        <!-- <li class="menu-item dropdown-content" id="product">
            <span> Thêm mặt hàng</span> 
            <i class="fas fa-angle-right"></i> 
        </li> -->

        <?php 
                  // if(isset($_SESSION['level_id'])){
                  //   if($_SESSION['level_id'] == 2){
                      // echo '
                      //   <li class="menu-item">
                      //     <a href="./employee_manager.php" class="menu-link"><i class="fas fa-user-plus"></i><span>Nhân viên</span></a>
                      //     <button onclick="employee_child()" class="dropbtn" > <i class="fas fa-angle-down" id="employee_btn"></i> </button>
                      //   </li>

                      //   <li class="menu-item dropdown-content" id="employee">
                      //     <a href="./add/add_employee.php" class="menu-link">• &nbsp; <span> Thêm nhân viên</span> <i class="fas fa-angle-right"></i> </a>
                      //   </li>

                      //   <li class="menu-item">
                      //     <a href="./manufacturer_manager.php" class="menu-link"><i class="fas fa-industry"></i><span>Nhà sản xuất</span></a>
                      //     <button onclick="manufacturer_child()" class="dropbtn" > <i class="fas fa-angle-down" id="manufacturer_btn"></i> </button>
                      //   </li>
                        
                      //   <li class="menu-item dropdown-content" id="manufacturer">
                      //     <a href="./add/add-manufacturer.php" class="menu-link">• &nbsp; <span> Thêm nhà sản xuất</span> <i class="fas fa-angle-right"></i> </a>
                      //   </li>
                      // ';
                  //   }
                  // } 
                
                ?>

        <li class="menu-item" id="order">
            <i class="fas fa-file-invoice"></i>  <span>Đơn hàng</span>
        </li>
        <li class="menu-item" id="category">
            <i class="fa fa-file" aria-hidden="true"></i> <span>Thể loại</span>
        </li>
        <li class="menu-item">
            <a href="./login/sign_out.php" class="menu-link" onclick="return confirm('Bạn muốn đăng xuất ?');"><i
                    class="fas fa-sign-out-alt"></i><span>Đăng xuất</span></a>
        </li>
        <!-- <li class="menu-item">
            <a href="?removeaccount=true" class="menu-link"
                onclick="return confirm('Bạn muốn xóa phiên đăng nhập hiện tại ?');"><i
                    class="fas fa-running"></i><span>Xóa phiên</span></a>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link"><i class="fas fa-info-circle"></i><span>Thông tin</span></a>
        </li> -->
    </ul>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script>

    $(document).ready(function(){
      $("#dashbroad").click(function(){
        $(".container-main").load("./dashboard/dashboard.php");
      });
    });

    $(document).ready(function(){
      $("#product").click(function(){
        $(".container-main").load("./product/product.php");
      });
    });

    $(document).ready(function(){
      $("#order").click(function(){
        $(".container-main").load("./type_product/type.php");
      });
    });
    $(document).ready(function(){
      $("#category").click(function(){
        $(".container-main").load("./product/form_type.php");
      });
    });


  function product_child() {
      document.getElementById("product").classList.toggle("show");
      document.getElementById("product_btn").classList.toggle("rotation");

  }

  function employee_child() {
      document.getElementById("employee").classList.toggle("show");
      document.getElementById("employee_btn").classList.toggle("rotation");

  }

  function manufacturer_child() {
      document.getElementById("manufacturer").classList.toggle("show");
      document.getElementById("manufacturer_btn").classList.toggle("rotation");
  }


</script>