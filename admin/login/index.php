<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../css/base.css"> -->
    <link rel="stylesheet" href="../css/login.css">
    <!-- <link rel="icon" type="image/x-icon" href="../../data/img/favicon.png"> -->
    <title>Q's Coffee | Staff Signing In</title>
</head>
<body>
    <?php 
    // if(isset($_SESSION['role'])){ 
    //         header('location:./');
    //         exit;
    // }
    ?>
    <div class="container">
        <div class="form-area">
            <div class="form-area__title">
                Q's Coffee - Staff Only
            </div>
            <div class="form-area__warn">
            Trang này là trang chỉ dành cho nhân viên. Nếu bạn không phải là nhân viên của công ty chúng tôi, vui lòng quay lại<a href="../../index.php"> trang chủ chính</a> 
            </div>
            <div class="form-area__login-form">
                <p>Welcome back! Vui lòng đăng nhập.</p>
                <div class="err">

                </div>
                <form >
                    <label >
                        Email:
                        <br>
                        <input type="email" name="email" required>
                        <!-- assmin@qcoffee.com:BigBossofQCoffee! -->
                    </label>
                    <label >
                        Password:
                        <br>
                        <input type="password" name="password" required>
                    </label>
                    <button type="submit">Sign in</button>
                    <!-- <input type="submit" value="Dang nhap" > -->
                </form>
            </div>
        </div>
    </div>
    <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>    
    <script>
        $(document).ready(function() {
            $("form").submit(function(event) {
                /* Act on the event */
                event.preventDefault();
                $.ajax({
                    url: './handle_signin.php',
                    type: 'POST',
                    dataType: 'html',
                    data: $(this).serializeArray(),
                })
                .done(function(data) {
                    console.log(JSON.stringify(data));
                    window.location.href="../";

                })
                .fail(function(data) {
                    $(".err").text(data["responseText"]);

                    // console.log("error");
                    console.log(JSON.stringify(data));  
                });
                
            });
        });
        
    </script>
</body>
</html>
