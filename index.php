
<?php 
    include_once("function/helper.php"); 
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

    <title>Awaza | One Page Parallax</title>

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

    <!-- Header start -->
    <header>
    <nav class="navbar navbar-top-default navbar-expand-lg static-nav nav-style center-logo black-nav fixed-black-nav bottom-nav no-animation">
        <div class="container">
            <a class="logo" href="javascript:void(0)">
                <img src="images/logo-black.png" alt="logo" title="Logo" class="logo-default">
            </a>
        </div>
    </nav>
    </header>
    <!-- Header end -->

    <!--Full Menu -->
    <section class="overlay-menu fullscreen center-block">
    <h2 class="d-none">heading</h2>
    <div class="quarter-circle">
        <div class="menu_bars2 active"> <span></span> <span></span> <span></span> </div>
    </div>
    <span class="overlay-effect"></span>
    <div class="centered">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 text-center">
                    <a href="<?php echo BASE_URL."page_check.php?page=index" ?>" class="logo-full mb-5 mb-xs-2rem"><img src="<?php echo BASE_URL."images/side-logo-black.png"?>" alt=""></a>
                </div>
                
            </div>
        </div>
    </div>
</section>
    <!--Full Menu-->

    <!-- Main Section start -->
    <section id="home" class="p-0">
       <h2 class="d-none">heading</h2>
    <!--Main Slider-->
        <div id="revo_thumbs_wrapper" class="rev_slider_wrapper fullwidthbanner-container">
            <div id="secondary-banner" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.1">
                <ul>
                    <!-- SLIDE 3  -->
                    <li data-index="rs-04" data-transition="fade" data-slotamount="default" data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="2000" data-fsmasterspeed="1500" data-param1="">

                        <!-- MAIN IMAGE -->
                        <img src="<?php echo BASE_URL."images/one.jpg"?>" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="10" data-no-retina>
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption tp-resizeme"
                             data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                             data-y="['middle','middle','middle','middle']" data-voffset="['-140','-140','-140','-140']"
                             data-fontsize="['60','60','60','50']"
                             data-whitespace="nowrap" data-responsive_offset="on"
                             data-width="['none','none','none','none']" data-type="text"
                             data-textalign="['center','center','center','center']"
                             data-transform_idle="o:1;"
                             data-transform_in="x:-50px;opacity:0;s:2000;e:Power3.easeOut;"
                             data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                             data-start="1000" data-splitin="none" data-splitout="none"
                             style="z-index:1; font-weight: 200; color: #ffffff;font-family: 'Open Sans', sans-serif;text-transform:capitalize">automated
                        </div>
                        <div class="tp-caption tp-resizeme"
                             data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                             data-y="['middle','middle','middle','middle']" data-voffset="['-70','-70','-70','-70']"
                             data-fontsize="['60','60','60','50']"
                             data-whitespace="nowrap" data-responsive_offset="on"
                             data-width="['none','none','none','none']" data-type="text"
                             data-textalign="['center','center','center','center']"
                             data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                             data-start="1200" data-splitin="none" data-splitout="none"
                             style="z-index:2; font-weight: 700; letter-spacing: 1px; color: #ffffff;font-family: 'Open Sans', sans-serif;text-transform:capitalize">tailor machine
                        </div>
                        <div class="tp-caption tp-resizeme"
                             data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                             data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                             data-fontsize="['60','60','60','50']"
                             data-whitespace="nowrap" data-responsive_offset="on"
                             data-width="['none','none','none','none']" data-type="text"
                             data-textalign="['center','center','center','center']"
                             data-transform_idle="o:1;"
                             data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                             data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                             data-start="1000" data-splitin="none" data-splitout="none"
                             style="z-index:3; font-weight: 100; color: #ffffff;font-family: 'Open Sans', sans-serif;text-transform:capitalize">online
                        </div>
                        <div class="tp-caption tp-resizeme"
                             data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                             data-y="['middle','middle','middle','middle']" data-voffset="['70','70','70','70']"
                             data-fontsize="['22','22','18','18']"
                             data-whitespace="nowrap" data-responsive_offset="on"
                             data-width="['none','none','none','none']" data-type="text"
                             data-textalign="['center','center','center','center']"
                             data-transform_idle="o:1;"
                             data-transform_in="z:0;rX:0deg;rY:0;rZ:0;sX:2;sY:2;skX:0;skY:0;opacity:0;s:1000;e:Power2.easeOut;"
                             data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                             data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                             data-start="1500" data-splitin="none" data-splitout="none"
                             style="z-index:4; font-weight: 100; color: #ffffff; line-height:30px; font-family: 'Open Sans', sans-serif;text-transform:capitalize">The Best Transaction Methud During Pandemi
                        </div>

                        <div class="tp-caption" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"  data-voffset="['150','150','150','150']" data-width="310" data-height="none" data-responsive_offset="on" data-textAlign="['center','center','center','center']" data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-frames='[{"delay":700,"speed":2000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:40px;","to":"o:1;fb:0;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"200","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;fb:0;"}]' style="box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;">
                            <a href="<?php echo BASE_URL."page_check.php?page=login" ?>" class="btn-setting btn-hvr-setting-main btn-transparent2 " style="color: #ffffff;"> Login
                                <span class="btn-hvr-setting btn-hvr-black">
						     <span class="btn-hvr-setting-inner">
							 <span class="btn-hvr-effect"></span>
                             <span class="btn-hvr-effect"></span>
                             <span class="btn-hvr-effect"></span>
                             <span class="btn-hvr-effect"></span>
                             </span>
                            </span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    <!--Main Slider ends -->
    </section>
    <!-- Main Section end -->


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


