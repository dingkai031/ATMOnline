<?php include_once("function/helper.php"); 
include_once("function/koneksi.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Favicon -->
    <link rel="icon" href="images/favicon.png">
    <!-- Bootstrap CSS File -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Animate CSS File -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Cube Portfolio CSS File -->
    <link rel="stylesheet" href="css/cubeportfolio.min.css">
    <!-- Fancy Box CSS File -->
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <!-- Revolution Slider CSS Files -->
    <link rel="stylesheet" href="css/navigation.css">
    <link rel="stylesheet" href="css/settings.css">
    <!-- Swiper CSS File -->
    <link rel="stylesheet" href="css/swiper.min.css">
    <!-- Owl Carousel CSS Files -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- Slick CSS Files -->
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">
    <!-- Style CSS File -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Custom Style CSS File -->
    <link rel="stylesheet" href="css/custom.css">

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="90">

    <!-- Loader -->
    <div class="loader" id="loader-fade">
        <div class="loader-container center-block">
            <div class="grid-row">
                <div class="col center-block">
                    <ul class="loading reversed">
                        <li></li>
                        <?php

                        $hasil_hash = $_POST['hasil_hash'];
                        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE hash='$hasil_hash'");

                        if (mysqli_num_rows($query) == 0 ) {
                            ?><script> alert("Maaf, Kartu tidak terdaftar. Silahkan Registrasi.");</script> 
                            <?php
                            header('Refresh: 0.001; URL=http://localhost/newATM/index.php');
                        }else {
                            $baris = mysqli_fetch_assoc($query);
                            
                            session_start();
        
                            $_SESSION['user_id'] = $baris['user_id'];
                            $_SESSION['nama'] = $baris['name'];
                            $_SESSION['level'] = $baris['level'];
                            $_SESSION['saldo'] = $baris['saldo'];
                            $_SESSION['email'] = $baris['email'];
                            $_SESSION['rek'] = $baris['rekening'];
        
                            ?><script> alert("Selamat, Kartu anda terdaftar");</script> 
                            <?php
        
                            header('Refresh: 0.001; URL=http://localhost/newATM/page_check.php?page=personal');
                        }

                        //$pin = $_POST['Ppin'];

                        ?>
                        <li> <script>$('#proses').modal(data-keyboard="false")</script></li>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="proses" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Verification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Please wait...</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap JS File -->
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Morphtext JS File -->
<script src="js/morphext.min.js"></script>
<!-- Appear JS File -->
<script src="js/jquery.appear.js"></script>
<!-- Isotop gallery -->
<script src="js/isotope.pkgd.min.js"></script>
<!-- Cube Portfolio JS File -->
<script src="js/jquery.cubeportfolio.min.js"></script>
<!-- Equal Height JS File -->
<script src="js/jquery.matchHeight-min.js"></script>
<!--Parallax Background-->
<script src="js/parallaxie.min.js"></script>
<!-- Fancy Box JS File -->
<script src="js/jquery.fancybox.min.js"></script>
<!-- Slick JS File -->
<script src="js/slick.min.js"></script>
<!-- Swiper JS File -->
<script src="js/swiper.min.js"></script>
<!-- Owl Carousel JS File -->
<script src="js/owl.carousel.js"></script>
<!-- Wow JS File -->
<script src="js/wow.js"></script>


    <!--Revolution Slider-->
<script src="js/revolution/jquery.themepunch.tools.min.js"></script>
<script src="js/revolution/jquery.themepunch.revolution.min.js"></script>
<script src="js/revolution/jquery.themepunch.revolution.contdown.min.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="js/revolution/extensions/revolution.extension.actions.min.js"></script>
<script src="js/revolution/extensions/revolution.extension.carousel.min.js"></script>
<script src="js/revolution/extensions/revolution.extension.kenburn.min.js"></script>
<script src="js/revolution/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="js/revolution/extensions/revolution.extension.migration.min.js"></script>
<script src="js/revolution/extensions/revolution.extension.navigation.min.js"></script>
<script src="js/revolution/extensions/revolution.extension.parallax.min.js"></script>
<script src="js/revolution/extensions/revolution.extension.slideanims.min.js"></script>
<script src="js/revolution/extensions/revolution.extension.video.min.js"></script>


<!-- Custom JS File -->
<script src="js/functions.js"></script>
</body>
</html>


