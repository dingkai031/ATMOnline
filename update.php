<?php
//--------------------------------------------DAFTRA---------------------------------------------------------------

    include_once("function/helper.php");
    include_once("function/koneksi.php");

    if (!isset($_GET['checked'])) {
        header('Refresh: 0.001; URL=http://localhost/newATM/admin.php');
    }elseif (isset($_GET['checked'])) {
        $acuan = $_GET['checked'];

        $query_update = "SELECT * FROM user WHERE hash='$acuan'";
    
        $pengguna  = mysqli_query($koneksi, $query_update);
        $row        = mysqli_fetch_array($pengguna);
    }
    
    
?>


<?php 

if (isset($_POST['ubah'])) {
    $tempname = $_POST['name'];
    $tempemail = $_POST['email'];
    $tempbankcode = $_POST['bankcode'];
    $temprekening = $_POST['account_number'];
    $tempphone = $_POST['phone'];
    $tempacuan = $_POST['hash'];

    mysqli_query($koneksi, "UPDATE user SET name='$tempname', email='$tempemail', bankcode='$tempbankcode', rekening='$temprekening', phone='$tempphone'  WHERE hash='$tempacuan'");
}




?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>ATMOnline | Admin</title>

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

    <!-- Register -->
    <section class="p-lg-0 login-sec">
    <div class="container-fluid">

        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="login-content">
                    <div class="main-title d-inline-block mb-4  text-md-left">
                        
                        <h3 class="mb-3 color-black">Update User</h3>
                        
                    </div>

                    <!--form-->
                    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                        <div class="row m-xs-0">
                            <input class="form-control" type="text" name="name" placeholder="<?php echo $row['name'] ?>" required="">
                        </div>
                        <div class="row m-xs-0">
                        <input class="form-control" type="text" name="email" placeholder="<?php echo $row['email'] ?>" required="">
                        </div>
                        <div class="row m-xs-0" style="display:none !important;">
                        <input class="form-control" type="text" name="hash" value="<?php echo $row['hash'] ?>" readonly>
                        </div>
                        <div class="row m-xs-0">
                            <div class="col-3" style="padding-left:0px !important;padding-right:0px !important;">
                                <input class="form-control" type="text" onkeypress="validate(event)" maxlength="3" name="bankcode" placeholder="<?php echo $row['bankcode'] ?>" required="">
                            </div>
                            <div class="col" style="padding-right:0px !important;">
                                <input class="form-control" type="text" onkeypress="validate(event)" maxlength="20" name="account_number" placeholder="<?php echo $row['rekening'] ?>" required="">
                            </div>
                        </div>
                        <div class="row m-xs-0">
                            <input class="form-control" type="text" onkeypress="validate(event)" maxlength="13" name="phone" placeholder="<?php echo $row['phone'] ?>" required="">
                        </div>
                        <div class="mt-40px">
                            <button type="submit" class="btn-setting btn-hvr-setting-main btn-yellow btn-hvr text-uppercase" name="ubah">Update
                                <span class="btn-hvr-setting btn-hvr-pink">
                                     <span class="btn-hvr-setting-inner">
                                     <span class="btn-hvr-effect"></span>
                                     <span class="btn-hvr-effect"></span>
                                     <span class="btn-hvr-effect"></span>
                                     <span class="btn-hvr-effect"></span>
                                     </span>
                                    </span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block p-0">
                <!--Feature Image Half-->
                <img src="images/register.jpg" class="about-img" alt="image" style=>
            </div>
        </div>


    </div>
</section>
    <!-- Register ends -->


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


<!-- number only -->
<script>
    function validate(evt) {
        var theEvent = evt || window.event;

        // Handle paste
        if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
        } else {
            // Handle key press
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
        }
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>
</body>
</html>


