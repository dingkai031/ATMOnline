<?php

    session_start();
    include_once("function/helper.php");
    $page = isset($_GET['page']) ? $_GET['page'] : false;

    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
    $nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
    $level = isset($_SESSION['level']) ? $_SESSION['level'] : false;

    
?>

<html>
    <head>
        <title>Simulasi ATM Online</title>
        <link rel="stylesheet" href="<?php echo BASE_URL."style/style.css" ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <div id = "container">
            <div id= "header">
                <a href="<?php echo BASE_URL."index.php"; ?>">
                    <img src="<?php echo BASE_URL."image/logo.png"; ?>" alt="" />
                </a>
            <div id = "menu">
                <div id = "user">
                    <?php
                        if($user_id) {
                            echo '<h3 style="color:white; display:inline-block;">Selamat datang, '.$nama;
                            echo '</h3>';
                        }else {?>
                            <a href="<?php echo BASE_URL."index.php?page=login" ?>">Login</a>
                            
                            <?php
                            //<a href="<?php echo BASE_URL."index.php?page=register" ?">Register</a>
                        }
                   ?>                    
                </div>
                <?php 
                    if ($user_id) {
                    echo '<a id="logout" style="text-align:center;width:60px;text-decoration:none; float:right;color:#1e5474;background:white;border-radius:3px;" href="logout.php"> <h3>Logout</h3></a>';
                    ?>
                    <div class="navbar" >
                        <a href="<?php echo BASE_URL."index.php" ?>">Home</a>
                        <div class="dropdown">
                            <button class="dropbtn" onclick="myFunction()">Menu
                                <i class="fa fa-caret-down"></i>
                            </button>
                            <div class="dropdown-content" id="myDropdown">
                                <a href="<?php echo BASE_URL."index.php?page=transfer" ?>">Transfer</a>
                                <a href="<?php echo BASE_URL."index.php?page=history" ?>">Lihat mutasi</a>
                                <a href="<?php echo BASE_URL."index.php?page=history2" ?>">History</a>
                                <a href="<?php echo BASE_URL."index.php?page=tarik" ?>">Tarik</a>
                            </div>
                        </div> 
                    </div>
                    
                    <?php
                    }
                ?>
            </div>
            </div>
            <div id = "content">
                
                <?php 
                    $filename = "$page.php";

                    if(file_exists($filename)) {
                        include_once($filename);
                    }elseif  ($user_id){
                        header('Refresh: 0.001; URL=http://localhost/ATM/index.php?page=transaksi');
                    }else {
                        /*echo "Maaf Halaman tidak tersedia";*/
                        ?>
                        <div id = "utama">
                            <img src="<?php echo BASE_URL."image/atm2.png" ?>" alt=""> 
                        </div>
                        <?php
                    }
                ?>
            </div>

            <div id = "footer">
                <p> Copyright Simulasi ATM 2020 </p>
            </div>
        </div>
        <script>

            function myFunction() {
                document.getElementById("myDropdown").classList.toggle("show");
            }


            window.onclick = function(e) {
                if (!e.target.matches('.dropbtn')) {
                    var myDropdown = document.getElementById("myDropdown");
                    if (myDropdown.classList.contains('show')) {
                        myDropdown.classList.remove('show');
                    }
                }
            }
        </script>
        <script src="alert/jquery.alerts.js"></script>
    </body>

</html>