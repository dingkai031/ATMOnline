<?php include_once("function/helper.php"); 

    session_start();

    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;

    if ($user_id) {
        header('Refresh: 0.001; URL=http://localhost/newATM/personal.php');
    } 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Awaza | Login</title>

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
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Loader ends -->

    <!-- Login -->
    <section class="p-lg-0 login-sec">
    <div class="container-fluid">

        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-2">
                <div class="login-content">
                    <div class="main-title d-inline-block mb-4 text-md-left">
                        <h3 class="mb-3 color-black">Login</h3>
                        <p>Access to the most powerful ATM in the web industry.</p>
                    </div>
                    <!--Alert-->
                    <div class="alert alert-warning alert-dismissible fade show with-icon" role="alert">
                        Please fill the following form with your information
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <!--form-->
                    <form action="<?php echo BASE_URL."proses_login.php" ?>" method="post">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" type="file" id="document" name="myfile" accept=".jpg,.png" required>
                            <label class="custom-file-label" for="document">Insert your card</label>
                        </div> 
                        <div class="form-group" style="display:none">
                            <label for="chunkSize">Chunk size in bytes</label>
                            <input type="text" id="chunkSize"  value="1048576"/>
                        </div>
                        <div class="form-group" style="display:none">
                            <label for="hash">Hash</label>
                            <input type="text" id="hash" name="hasil_hash" />
                        </div>
                        <div style="margin-top:1em !important;">
                            <input  type="password" name="password" placeholder="Pin" required="" maxlength="6" style="width:5em !important">
                        </div>
                        
                        <div class="form-button mt-40px">
                            <button type="submit" class="btn-setting btn-hvr-setting-main btn-yellow btn-hvr text-uppercase" id="submit_btn">Login
                                <span class="btn-hvr-setting btn-hvr-pink">
                                     <span class="btn-hvr-setting-inner">
                                     <span class="btn-hvr-effect"></span>
                                     <span class="btn-hvr-effect"></span>
                                     <span class="btn-hvr-effect"></span>
                                     <span class="btn-hvr-effect"></span>
                                     </span>
                                    </span>
                            </button>
                            <a href="forget-password.html">Lost card or forget pin?</a>
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block p-0">
                <!--Feature Image Half-->
                <img src="<?php echo BASE_URL."images/two.jpg"?>" class="about-img" alt="image">
            </div>
        </div>


    </div>
</section>
    <!-- Login ends -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap JS File -->
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Appear JS File -->
<script src="js/jquery.appear.js"></script>
<!-- Isotop gallery -->
<script src="js/isotope.pkgd.min.js"></script>
<!-- Morphtext JS File -->
<script src="js/morphext.min.js"></script>
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
<script src="./crypto-js/crypto-js.js"></script>

<script src="./index.js"></script>



</body>
</html>


