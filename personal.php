<?php 
    session_start();
    include_once("function/helper.php");

    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;

    if (!$user_id){
        header('Refresh: 0.001; URL=http://localhost/newATM/index.php');
    }else {
        $nama = $_SESSION['nama'];
        $level = $_SESSION['level']; 
        $saldo = $_SESSION['saldo']; 
        $email = $_SESSION['email']; 
        $rek = $_SESSION['rek'];
        $bankcode = $_SESSION['bankcode'];
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
    <!-- Addon Particles CSS Files -->
    <link rel="stylesheet" href="css/revolution.addon.particles.css">
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
        <nav class="navbar navbar-top-default navbar-expand-lg static-nav nav-style seven-links transparent-bg">
            <div class="container">
                <a class="logo" href="javascript:void(0)">
                    <img src="images/logo-white.png" alt="logo" title="Logo" class="logo-default">
                    <img src="images/logo-black.png" alt="logo" title="Logo" class="logo-scrolled">
                </a>
                <div class="collapse navbar-collapse d-none d-lg-block">
                    <ul class="nav navbar-nav ml-auto menu__list">
                        <li class="nav-item menu__item"> <a href="#home" class="scroll nav-link menu__link">home</a>
                        </li>
                        <li class="nav-item menu__item"> <a href="#personal_info" class="scroll nav-link menu__link">personal info</a>
                        </li>
                        <li class="nav-item menu__item"> <a href="#transfer" class="scroll nav-link menu__link">transfer</a>
                        </li>
                        <li class="nav-item menu__item"> <a href="#transaction" class="scroll nav-link menu__link">transaction</a>
                        </li>
                        <li class="nav-item menu__item"> <a href="#pay" class="scroll nav-link menu__link">pay to e-commerce</a>
                        </li>
                    </ul>
                </div>
                <!-- side menu open button -->
                <button type="button" class="btn btn-dark">
                    <a href="<?php echo BASE_URL."page_check.php?page=logout" ?>" style="color:#ffffff !important">Logout</a>
                </button>
            </div>
        </nav>
    </header>
    <!-- Header end -->    

    <!-- Main Section start -->
    <section id="home" class="p-0 bg-img-4 bg-img-setting center-block">
        <h2 class="d-none">hidden</h2>
        <div class="fullscreen">
            <div class="container">
                <div class="row">
                  <div class="col-lg-12 text-left center-col">
                    <div class="text-white">
                        <h2 class="font-weight-600">Welcome, <?php echo $nama ?></h2>
                        <h3 id="personal"></h3>
                    </div>
                  </div>
                </div>
            </div>
            <div class="scrolldown">
                <a href="#personal_info" class="scroll"></a>
            </div>
        </div>
    </section>
    <!-- Main Section end -->

    <!-- personal_info start -->
    <section id="personal_info" class="stats half-section p-0">
    <h2 class="d-none">heading</h2>
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 order-lg-2">
                <div class="skill-box">
                    <div class="main-title mb-5 text-md-left wow fadeIn" data-wow-delay="300ms">
                        <h2 class="text-initial"> Personal Information</h2>
                    </div>
                   <ul class="text-left">
                        <li class="detail-data" style="border-bottom: 0.2em solid #FAF6F5;">
                            <h6 class="font-18 mb-0 text-capitalize">Name  <span class="float-sm-right"><b class="font-weight-500"><?php echo $nama ?></b></span></h6>
                        </li>
                        <li class="detail-data" style="border-bottom: 0.2em solid #FAF6F5;">
                            <h6 class="font-18 mb-0 text-capitalize">Balance  <span class="float-sm-right"><b class="font-weight-500"><?php echo $saldo ?></b></span></h6>
                        </li>
                        <li class="detail-data" style="border-bottom: 0.2em solid #FAF6F5;">
                            <h6 class="font-18 mb-0 text-capitalize">Email  <span class="float-sm-right"><b class="font-weight-500"><?php echo $email ?></b></span></h6>
                        </li>
                        <li class="detail-data" style="border-bottom: 0.2em solid #FAF6F5;">
                            <h6 class="font-18 mb-0 text-capitalize">Rek num.  <span class="float-sm-right"><b class="font-weight-500"><?php echo $rek ?></b></span></h6>
                        </li>
                        <li class="detail-data" style="border-bottom: 0.2em solid #FAF6F5;">
                            <h6 class="font-18 mb-0 text-capitalize">Bank code  <span class="float-sm-right"><b class="font-weight-900"> <?php echo $bankcode ?></b>&nbsp;<?php echo $rek ?></span></h6>
                        </li>
                        
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 p-0">
                <div class="hover-effect">
                    <img alt="about" src="<?php echo BASE_URL.'images/muka.jpg' ?>" class="about-img style="width:961px; height:956px; object-fit:cover"">
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- About ends -->


    <!-- Team start -->
    <section id="transfer">
        <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="login-content">
                    <div class="main-title d-inline-block mb-4  text-md-left">
                        <h2 class="mb-3 color-black">Transfer.</h2>
                    </div>

                    <!--form-->
                    <form action="<?php echo BASE_URL."proses_transfer.php" ?>" method="post">
                        <div class="row">
                            <div class="col-4">
                                <input maxlength="3"  class="form-control" type="text" name="bank_code" placeholder="Bank Code" required="">
                            </div>
                            <div class="col">
                                <input maxlength="20" class="form-control" type="text" name="rek" placeholder="Rek Num." required="">
                            </div>
                        </div>
                        
                        <input  maxlength="10" class="form-control" type="text" name="amount" placeholder="Balance amount" required="">
                        <div class="form-button mt-40px">
                            <button type="submit" style="background-color:#E2D7D5 !important;" class="btn-setting btn-hvr-setting-main btn-white btn-hvr text-uppercase" >Transfer
                                <span class="btn-hvr-setting btn-hvr-black">
                                     <span class="btn-hvr-setting-inner">
                                     <span class="btn-hvr-effect"></span>
                                     <span class="btn-hvr-effect"></span>
                                     <span class="btn-hvr-effect"></span>
                                     <span class="btn-hvr-effect"></span>
                                     </span>
                                    </span>
                            </button>
                            <a href="forget-password.html">Bank code list</a>
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block p-0">
                <!--Feature Image Half-->
                <img src="images/transaksi.jpg" class="about-img" alt="image" style="width:961px; height:956px; object-fit:cover" >
            </div>
        </div>


    </div>
    </section>
    <!-- Team ends -->

    <!-- Work Starts -->
    <section id="transaction" class="bg-light-gray pb-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-title mb-2rem wow fadeIn" data-wow-delay="300ms">
                        <h5> Some of the best work </h5>
                        <h2> creative portfolio </h2>
                        <p>Curabitur mollis bibendum luctus. Duis suscipit vitae dui sed suscipit. Vestibulum auctor nunc vitae diam eleifend, in maximus metus sollicitudin. Quisque vitae sodales lectus. Nam porttitor justo sed mi finibus, vel tristique risus faucibus. </p>
                    </div>
                </div>
            </div>
            <div class="row d-block">

                <div id="js-filters-mosaic-flat" class="cbp-l-filters-alignCenter">
                    <div data-filter="*" class="cbp-filter-item-active cbp-filter-item cbp-filter-style">
                        All <div class="cbp-filter-counter"></div>
                    </div>
                    <div data-filter=".graphic-designs" class="cbp-filter-item cbp-filter-style">
                        Graphic Designs <div class="cbp-filter-counter"></div>
                    </div>
                    <div data-filter=".web-designs" class="cbp-filter-item cbp-filter-style">
                        Web Designs <div class="cbp-filter-counter"></div>
                    </div>
                    <div data-filter=".seo" class="cbp-filter-item cbp-filter-style">
                        SEO <div class="cbp-filter-counter"></div>
                    </div>
                    <div data-filter=".marketing" class="cbp-filter-item">
                        Marketing <div class="cbp-filter-counter"></div>
                    </div>
                </div>

                <div id="js-grid-mosaic-flat" class="cbp cbp-l-grid-mosaic-flat no-transition">
                    <div class="cbp-item web-designs marketing">
                        <a href="images/work1.jpg" class="cbp-caption cbp-lightbox" data-title="Bolt UI<br>by Tiberiu Neamu">
                            <div class="cbp-caption-defaultWrap">
                                <img src="images/work1.jpg" alt="work">
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <p>Elegant | Images</p>
                                        <div class="cbp-l-caption-title">We are digital agency</div>
                                        <span class="work-icon">
                                                <i class="ti ti-arrow-right"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="cbp-item graphic-designs seo">
                        <a href="images/work2.jpg" class="cbp-caption cbp-lightbox" data-title="World Clock<br>by Paul Flavius Nechita">
                            <div class="cbp-caption-defaultWrap">
                                <img src="images/work2.jpg" alt="work">
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <p>Elegant | Images</p>
                                        <div class="cbp-l-caption-title">Creative art work</div>
                                        <span class="work-icon">
                                                <i class="ti ti-arrow-right"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="cbp-item graphic-designs web-designs">
                        <a href="images/work3.jpg" class="cbp-caption cbp-lightbox" data-title="WhereTO App<br>by Tiberiu Neamu">
                            <div class="cbp-caption-defaultWrap">
                                <img src="images/work3.jpg" alt="work">
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <p>Elegant | Images</p>
                                        <div class="cbp-l-caption-title">Modern portfolio</div>
                                        <span class="work-icon">
                                                <i class="ti ti-arrow-right"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="cbp-item seo marketing">
                        <a href="images/work6.jpg" class="cbp-caption cbp-lightbox" data-title="Remind~Me Widget<br>by Tiberiu Neamu">
                            <div class="cbp-caption-defaultWrap">
                                <img src="images/work6.jpg" alt="work">
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <p>Elegant | Images</p>
                                        <div class="cbp-l-caption-title">Digital art works</div>
                                        <span class="work-icon">
                                                <i class="ti ti-arrow-right"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="cbp-item web-designs seo">
                        <a href="images/work4.jpg" class="cbp-caption cbp-lightbox" data-title="Seemple* Music<br>by Tiberiu Neamu">
                            <div class="cbp-caption-defaultWrap">
                                <img src="images/work4.jpg" alt="work">
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <p>Elegant | Images</p>
                                        <div class="cbp-l-caption-title">Photography</div>
                                        <span class="work-icon">
                                                <i class="ti ti-arrow-right"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="cbp-item web-designs marketing">
                        <a href="images/work5.jpg" class="cbp-caption cbp-lightbox" data-title="iDevices<br>by Tiberiu Neamu">
                            <div class="cbp-caption-defaultWrap">
                                <img src="images/work5.jpg" alt="work">
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <p>Elegant | Images</p>
                                        <div class="cbp-l-caption-title">Modern workspace</div>
                                        <span class="work-icon">
                                                <i class="ti ti-arrow-right"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Work ends -->

    <!-- Pricing start -->
    <section id="pay">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-title wow fadeIn" data-wow-delay="300ms">
                        <h5> We have flexible pricing </h5>
                        <h2> Awaza's Packages</h2>
                        <p>Curabitur mollis bibendum luctus. Duis suscipit vitae dui sed suscipit. Vestibulum auctor nunc vitae diam eleifend, in maximus metus sollicitudin. Quisque vitae sodales lectus. Nam porttitor justo sed mi finibus, vel tristique risus faucibus.</p>
                    </div>
                </div>
            </div>
            <div class="row three-col-pricing">
                <div class="col-lg-4 col-md-6 col-sm-12 text-center md-mb-5 wow fadeInUp">
                    <div class="pricing-item-two">
                        <div class="price-upper-column">
                        <div class="price-box clearfix">
                            <div class="price_title">
                                <h4 class="text-capitalize">Standard</h4>
                            </div>
                            <div class="price">
                                <h2 class="position-relative"><span class="dollar font-14">$</span>22<span class="month"> Monthly</span></h2>
                            </div>
                            <div class="rating">
                                <i class="ti ti-star"></i>
                                <i class="ti ti-star"></i>
                                <i class="ti ti-star"></i>
                                <i class="ti ti-star"></i>
                                <i class="ti ti-star"></i>
                            </div>
                        </div>
                        </div>
                        <div class="price-down-column">
                        <div class="price-description">
                            <p>Full Access</p>
                            <p>Unlimited Bandwidth</p>
                            <p>Email Accounts</p>
                            <p>8 Free Forks Every Months</p>
                        </div>
                            <a href="javascript:void(0)" class="btn-setting btn-hvr-setting-main btn-transparent2 btn-hvr">choose plan
                                <span class="btn-hvr-setting btn-hvr-yellow">
						     <span class="btn-hvr-setting-inner">
							 <span class="btn-hvr-effect"></span>
                             <span class="btn-hvr-effect"></span>
                             <span class="btn-hvr-effect"></span>
                             <span class="btn-hvr-effect"></span>
                             </span>
                            </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 text-center md-mb-5 wow fadeInUp">
                    <div class="pricing-item-two advance-plan">
                        <div class="price-upper-column">
                            <div class="price-box clearfix">
                                <div class="price_title">
                                    <h4 class="text-capitalize">Advance</h4>
                                </div>
                                <div class="price">
                                    <h2 class="position-relative"><span class="dollar font-14">$</span>55<span class="month"> Monthly</span></h2>
                                </div>
                                <div class="rating">
                                    <i class="ti ti-star"></i>
                                    <i class="ti ti-star"></i>
                                    <i class="ti ti-star"></i>
                                    <i class="ti ti-star"></i>
                                    <i class="ti ti-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="price-down-column">
                            <div class="price-description">
                                <p>Full Access</p>
                                <p>Unlimited Bandwidth</p>
                                <p>Email Accounts</p>
                                <p>8 Free Forks Every Months</p>
                            </div>
                            <a href="javascript:void(0)" class="btn-setting btn-hvr-setting-main btn-yellow">choose plan
                                <span class="btn-hvr-setting">
						     <span class="btn-hvr-setting-inner">
							 <span class="btn-hvr-effect"></span>
                             <span class="btn-hvr-effect"></span>
                             <span class="btn-hvr-effect"></span>
                             <span class="btn-hvr-effect"></span>
                             </span>
                            </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 text-center wow fadeInUp">
                    <div class="pricing-item-two">
                        <div class="price-upper-column">
                            <div class="price-box clearfix">
                                <div class="price_title">
                                    <h4 class="text-capitalize">Standard</h4>
                                </div>
                                <div class="price">
                                    <h2 class="position-relative"><span class="dollar font-14">$</span>22<span class="month"> Monthly</span></h2>
                                </div>
                                <div class="rating">
                                    <i class="ti ti-star"></i>
                                    <i class="ti ti-star"></i>
                                    <i class="ti ti-star"></i>
                                    <i class="ti ti-star"></i>
                                    <i class="ti ti-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="price-down-column">
                            <div class="price-description">
                                <p>Full Access</p>
                                <p>Unlimited Bandwidth</p>
                                <p>Email Accounts</p>
                                <p>8 Free Forks Every Months</p>
                            </div>
                            <a href="javascript:void(0)" class="btn-setting btn-hvr-setting-main btn-transparent2 btn-hvr">choose plan
                                <span class="btn-hvr-setting btn-hvr-yellow">
						     <span class="btn-hvr-setting-inner">
							 <span class="btn-hvr-effect"></span>
                             <span class="btn-hvr-effect"></span>
                             <span class="btn-hvr-effect"></span>
                             <span class="btn-hvr-effect"></span>
                             </span>
                            </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing ends -->




    <!-- Footer starts -->
    <footer class="p-half bg-black2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <ul class="footer-icons mb-4">
                        <li><a href="javascript:void(0)" class="wow fadeInUp"><i class="ti ti-facebook"></i> </a> </li>
                        <li><a href="javascript:void(0)" class="wow fadeInDown"><i class="ti ti-twitter"></i> </a> </li>
                        <li><a href="javascript:void(0)" class="wow fadeInUp"><i class="ti ti-google"></i> </a> </li>
                        <li><a href="javascript:void(0)" class="wow fadeInDown"><i class="ti ti-linkedin"></i> </a> </li>
                        <li><a href="javascript:void(0)" class="wow fadeInUp"><i class="ti ti-instagram"></i> </a> </li>
                        <li><a href="javascript:void(0)" class="wow fadeInDown"><i class="ti ti-pinterest"></i> </a> </li>
                    </ul>
                    <p class="copyrights mt-2 mb-2">© 2019 Awaza. Made with love by <a href="javascript:void(0)">themesindustry</a></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer ends -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap JS File -->
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

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
<!-- Morphtext JS File -->
<script src="js/morphext.min.js"></script>
<!-- Typewriter JS File -->
<script src="js/typewriter.js"></script>
<!-- Owl Carousel JS File -->
<script src="js/owl.carousel.js"></script>
<!-- Wow JS File -->
<script src="js/wow.js"></script>


<!-- Revolution Slider -->
<script src="js/revolution/jquery.themepunch.tools.min.js"></script>
<script src="js/revolution/jquery.themepunch.revolution.min.js"></script>
<script src="js/revolution/jquery.themepunch.revolution.contdown.min.js"></script>

<!-- Particles Addon -->
<script src="js/revolution/revolution.addon.particles.min.js"></script>
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

<!-- Google Map Api -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJScy7qJ156DWM8kJVG-ZrK0R7Kize2Jg"></script>
<script src="js/maps.min.js"></script>

<!-- Custom JS File -->
<script src="js/functions.js"></script>
</body>
</html>


