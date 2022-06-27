<?php 
    //   include './login/check_login.php';
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tổng quan</title>
    <link rel="stylesheet" href="./css/style.css">
    <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>

</head>

<body>
    <div class="grid-container">
        <div class="container-header">
            <?php include './root/navbar.php'; ?>
        </div>
        <div class="container-menu">
            <?php include './root/sidebar.php'; ?>
        </div>
        <div class="container-main">
        <?php include './dashboard/dashboard.php'; ?>
        
        </div>
        <div class="container-footer">
            <?php include './root/footer.php'; ?>


        </div>
    </div>

    <div id="box-popup" class="overlay">
            <div class="popup">              
            </div>
    </div>


    <!-- <script src="https://kit.fontawesome.com/cb1ae4cd96.js" crossorigin="anonymous"></> -->
    <!-- <script src="./JS/selectOption.js"></script> -->

</body>

</html>