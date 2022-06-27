
<body>
    <?php 
        if(!isset($_SESSION)){
            session_start();
        }
    ?>
        <div class="header">
            <div class="empty"> </div>
            <form action="" method="get" style="margin-right: auto; margin-left: auto;">
                <input id="header-search" name="search" class="fontAwesome" type="search" placeholder="&#xF002; Tìm kiếm">
            </form>
            <ul class="header-menu">
                <li>
                    <!-- <img class="header-avt" src="https://i.ibb.co/gjYSPt9/97387265-911934715945271-6195268394929881088-o.jpg" alt=""> -->
                </li>
                <li>
                    <a href="#"><?php 
                        if(isset($_SESSION['admin']['name'])){
                        echo $_SESSION['admin']['name'];
                    }else{
                        echo 'Admin';
                    }
                    ?>
                    </a>
                </li>
                
            </ul>
        </div>
</body>
</html>

