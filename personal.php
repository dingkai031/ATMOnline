<?php 
    session_start();
    include_once("function/helper.php");
    include_once("function/koneksi.php");
    
    
    
//C------------------------------CHECK APAKAH ADA USER, JIKA TIDAK ADA, TIDAK BISA AKSES PERSONAL DASHBOARD-----------------------
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;

    if (!$user_id){
        header('Refresh: 0.001; URL=http://localhost/newATM/index.php');
    }else {
        $nama = $_SESSION['nama'];
        $saldo = $_SESSION['saldo']; 
        $email = $_SESSION['email']; 
        $rek = $_SESSION['rek'];
        $bankcode = $_SESSION['bankcode'];
        $linkpp = $_SESSION['link'];
    }
?>

<?php
//--------------------------------------------PROSES TRANSFER---------------------------------------------------------------

    include_once("function/helper.php");
    include_once("function/koneksi.php");


    if (isset($_POST['transfer'])) {
        $bank_code_tujuan = $_POST['bank_code'];
        $rek_tujuan = $_POST['rek'];
        $bal = $bal_sebelum_sanksi = $_POST['amount'];
         
        $sanksi = 2500;

        $query_bankcode = mysqli_query($koneksi, "SELECT * FROM bank WHERE bankcode='$bank_code_tujuan'");
        $query_rek = mysqli_query($koneksi, "SELECT * FROM user WHERE bankcode='$bank_code_tujuan' AND rekening='$rek_tujuan'");
        $querypemilik = mysqli_query($koneksi, "SELECT * FROM user WHERE name='$nama'");
        $penalty = false;

        if (mysqli_num_rows($query_bankcode) == 0 ) {
            $bankcode_error = 'Sorry, bankcode is not valid';
        }
        if ($rek == $rek_tujuan) {
            $rek_error = "Sorry, destination account number could not be the same as your's";
        }elseif (mysqli_num_rows($query_rek) == 0 ) {
            $rek_error = 'Sorry, account number could not be found';
        }
        if ($saldo<=$bal) {
            $saldo_error = 'Sorry, your balance is not sufficient';
        }
        if (mysqli_num_rows($query_bankcode) >= 0 ) {
            if ($rek != $rek_tujuan and mysqli_num_rows($query_rek) >= 0) {
                if ($saldo>$bal) {
                    if ($bankcode != $bank_code_tujuan) {
                        $bal = $bal + $sanksi;
                        $penalty = true;
                    }
                    $pemilik = mysqli_fetch_assoc($querypemilik);
                    $akuntujuan = mysqli_fetch_assoc($query_rek);
                    $namatujuan = $akuntujuan['name'];
                    $idtujuan = $akuntujuan['user_id'];
                    $tanggal = date("Y-m-d H:i");
    
                    $saldopemilikakhir = $pemilik['saldo'] - $bal ;
                    $saldotujuanakhir = $akuntujuan['saldo'] + $bal;

                    $nominalmutasinambah = "+ ".$bal;
                    $nominalmutasingurang = "- ".$bal;

                    if ($penalty) {
                        $ketberkurang = "Transfer an amount of " . $bal_sebelum_sanksi. " to ". $namatujuan. " with a penalty of ".$sanksi;
                        $ketbertambah = "Received an amount of " . $bal_sebelum_sanksi. " from ". $nama . " with a penalty of ".$sanksi;
                    }

                    $ketberkurang = "Transfer an amount of ".$bal_sebelum_sanksi. " to ".$namatujuan;
                    $ketbertambah = "Received an amount of ".$bal_sebelum_sanksi." from ".$nama;

                    if (mysqli_query($koneksi, "UPDATE user SET saldo='$saldopemilikakhir' WHERE name='$nama'") && mysqli_query($koneksi, "UPDATE user SET saldo='$saldotujuanakhir' WHERE name='$namatujuan'")){
                        mysqli_query($koneksi, "INSERT INTO transaksi (mutasi, waktu_tanggal, user_id, keterangan ) VALUES ('$nominalmutasingurang','$tanggal', '$user_id', '$ketberkurang')");
                        mysqli_query($koneksi, "INSERT INTO transaksi (mutasi, waktu_tanggal, user_id, keterangan ) VALUES ('$nominalmutasinambah','$tanggal', '$idtujuan', '$ketbertambah')");
                        $_SESSION['saldo'] = $saldopemilikakhir;
                        ?><script> alert("Transfer succedd");</script> 
                        <?php
                        header('Refresh: 0;');
                    }
                }
                
            }
        }
    }
?>

<?php 

//------------------------MENCARI LINK BANK--------------------------------------------------

    $query_nama_bank = mysqli_query($koneksi, "SELECT * FROM bank WHERE bankcode='$bankcode';");
    $row = mysqli_fetch_assoc($query_nama_bank);
    $link = $row['link'];
?>

<?php 
//--------------------------SEMUA DATA BANK---------------
    $query_semua_nama_bank = mysqli_query($koneksi, "SELECT * FROM bank");
?>

<?php 
//--------------------------SEMUA DATA lembaga---------------
    $query_semua_nama_Institution = mysqli_query($koneksi, "SELECT * FROM payment");
?>


<?php 
//----------------------history transaksi---------------------------
    $query_history = mysqli_query($koneksi, "SELECT waktu_tanggal,keterangan FROM transaksi WHERE user_id='$user_id' ORDER BY Month(waktu_tanggal) ASC");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>ATM Online | Personal </title>

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

    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.17.1/dist/bootstrap-table.min.css">


</head>
<body data-spy="scroll" data-target=".navbar" data-offset="90">

<!-- Loader -->

<!-- Loader ends -->

    <!-- Header start -->
    <header>
        <nav class="navbar navbar-top-default navbar-expand-lg static-nav nav-style seven-links transparent-bg">
            <div class="container">
                <a class="logo" href="<?php echo BASE_URL."page_check.php?page=index" ?>">
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
    <section id="home" class="p-0 bg-img-4 bg-img-setting center-block" style="margin-bottom:0px !important">
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
    <section id="personal_info" class="stats half-section p-0" style="padding-top:60px !important;padding-bottom:60px !important; ">
    <h2 class="d-none">heading</h2>
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 order-lg-2">
                <div class="skill-box">
                    <div class="main-title mb-5 text-md-left wow fadeIn" data-wow-delay="300ms">
                        <h2 class="text-initial"> Personal Information</h2>
                    </div>
                   <ul class="text-left wow fadeInRight">
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
                            <h6 class="font-18 mb-0 text-capitalize">Account num.  <span class="float-sm-right"><b class="font-weight-900"> <?php echo $bankcode ?></b>&nbsp;<?php echo $rek ?></span></h6>
                        </li>
                        <li class="detail-data">
                            <img class="float-sm-right" src="<?php echo $link ?>" style="width:128p;height:92px;object-fit:cover">
                        </li>
                        
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 p-0 ">
                <div class="hover-effect">
                    <img alt="about" src="<?php echo $linkpp ?>" class="about-img wow fadeInLeft" style="width:961px; height:956px; object-fit:cover">
                </div>
            </div>
        </div>
    </div>
    </section>



    <section id="transfer" class="parallax-setting parallaxie parallax1" style="padding-top:290px !important;padding-bottom:290px !important;margin-top:0px !important; ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                <div class="main-title mb-4  wow fadeInDown">
                        <h5>Your transaction will be secure</h5>
                        <h1 class="mb-3" style="color:#f7f7f7 !important;">Transfer</h1>
                        <p style="color:#f7f7f7 !important;">Always make sure your recipient number is correct, because we can't undo the transaction.</p>
                    </div>
                </div>
            </div>
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="login-content">
                    

                    <!--form-->
                    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="wow fadeInLeft" >
                        <div class="row">
                            <div class="col-3">
                                <input style="text-align: center" maxlength="3"  class="form-control" type="text" name="bank_code" placeholder="Code" required="" value="<?php 
                                    if (isset($_POST['transfer'])) {if(!isset($bankcode_error)) { echo $bank_code_tujuan;}}   
                                ?>" onkeypress='validate(event)'>
                                <?php if(isset($bankcode_error)): ?>
                                    <span style="color:#ff1637 !important;font-size:14px;"><?php echo $bankcode_error; ?></span>
                                <?php endif?>
                            </div>
                            <div class="col" style="padding-left:0px">
                                <input onkeypress="validate(event)" maxlength="20" class="form-control" type="text" name="rek" placeholder="Rek Num." required="" value="<?php if (isset($_POST['transfer'])) {if(!isset($rek_error)) { echo $rek_tujuan;}}?>">
                                <?php if(isset($rek_error)): ?>
                                    <span style="color:#ff1637 !important; font-size:14px !important" ><?php echo $rek_error; ?></span>
                                <?php endif?>
                            </div>
                        </div>
                        
                        <input onkeypress="validate(event)" maxlength="10" class="form-control" type="text" name="amount" placeholder="Balance amount" required="" value="<?php 
                                    if (isset($_POST['transfer'])) {if(!isset($saldo_error)) { echo $bal;}}
                                ?>">
                        <?php if(isset($saldo_error)): ?>
                                    <span style="color:#ff1637 !important; font-size:14px !important" ><?php echo $saldo_error; ?></span>
                        <?php endif?>
                        <div class="form-button mt-40px">
                            <button type="button" data-toggle="modal" data-target="#previewtrans" style="background-color:#E2D7D5 !important;" class="btn-setting btn-hvr-setting-main btn-white btn-hvr text-uppercase" >Review
                                <span class="btn-hvr-setting btn-hvr-black">
                                     <span class="btn-hvr-setting-inner">
                                     <span class="btn-hvr-effect"></span>
                                     <span class="btn-hvr-effect"></span>
                                     <span class="btn-hvr-effect"></span>
                                     <span class="btn-hvr-effect"></span>
                                     </span>
                                    </span>
                            </button>
                            <a href="#" data-toggle="modal" data-target="#bankcodelist" style="color:#ff1637"> Bank code list </a>
                        </div>


                        <div class="modal fade" id="bankcodelist" role="dialog">
                            <div class="modal-dialog">
    
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
            
                                        <?php 
                                        echo "<table class='table'>"; // start a table tag in the HTML
                                        echo "<thead><tr><th scope='col'>Bank code</th><th scope='col'>Bank name</th><th scope='col'>Bank logo</th></tr></thead>";
                                        echo "<tbody>";
                                        
                                        while($temp = mysqli_fetch_array($query_semua_nama_bank)){   //Creates a loop to loop through results
                                            echo "<tr><td>" . $temp['bankcode'] . "</td><td>" . $temp['name'] . "</td><td><img src='". $temp['link'] . "'></td></tr>" ;  //$row['index'] the index here is a field name
                                        }
                                        echo "</tbody>";
                                        echo "</table>"; //Close the table in HTML
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                             <!-- Modal review -->
                        <div class="modal fade" id="previewtrans" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title">Confirmation</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        
                                    </div>
                                    <div class="modal-body">
                                        <p>Before you continue your transaction, we suggest to double check your data.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button name="transfer" type="submit" style="color:#ffffff" class="btn-setting btn-hvr-setting-main btn-gray btn-hvr text-uppercase" >Transfer
                                            <span class="btn-hvr-setting btn-hvr-pink" >
                                                <span class="btn-hvr-setting-inner">
                                                    <span class="btn-hvr-effect"></span>
                                                    <span class="btn-hvr-effect"></span>
                                                    <span class="btn-hvr-effect"></span>
                                                    <span class="btn-hvr-effect"></span>
                                                </span>
                                            </span>
                                        </button>
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
    </section>
    

    
    <section id="transaction" class="bg-light-gray" style="margin-bottom:50px !important;margin-top:0px !important;padding-bottom:0px !important">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-title mb-2rem wow fadeIn" data-wow-delay="300ms">
                        <h5> Everything is recorded here </h5>
                        <h2> Transaction </h2>
                        <p>If you found any data that is not correctly writed, missing data or a data that shouldn't be there <br> you suggest to contact us as soon as possible. </p>
                    </div>
                </div>
            </div>
            <div class="row d-block">
                <div>
                    <?php 
                        echo "<table  data-toggle='table' data-pagination='true' data-search='true' data-page-list='[10, 16, 32, 50, all]'>"; // start a table tag in the HTML
                        echo "<thead style='color:#ffffff !important;background-color:#37474F !important'><tr><th >No</th><th >Date</th><th >Information</th></tr></thead>";
                        echo "<tbody>";
                        $i = 1;
                                        
                        while($temp2 = mysqli_fetch_array($query_history)){   //Creates a loop to loop through results
                            echo "<tr><td>" . $i . "</td><td>" . $temp2['waktu_tanggal'] . "</td><td>". $temp2['keterangan'] . "</td></tr>" ;  //$row['index'] the index here is a field name
                            $i++;
                        }
                        echo "</tbody>";
                        echo "</table>"; //Close the table in HTML
                    ?>
                </div>
            </div>
        </div>
    </section>
   

    
    <section id="pay"  class="parallax-setting parallaxie parallax2" style="padding-bottom:290px !important;padding-top:290px !important;magrin-top:270px !important;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="main-title wow rotateInDownLeft" data-wow-delay="300ms">
                        <h5> The very best secure payment.  </h5>
                        <h2 style="color:#fff !important"> Pay to e-commerce</h2>
                        <p style="color:#fff !important">We will not be responsible for any transactions made outside of this website </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                <div class="login-content">
                <form action="#" method="post" class="wow fadeInLeft" >
                        <div class="row">
                            <div class="col-4">
                                <input maxlength="3"  class="form-control" type="text" name="bank_code" placeholder="Institution Code" required="" onkeypress='validate(event)'>
                                <?php if(isset($bankcode_error)): ?>
                                    <span style="color:#ff1637 !important;font-size:14px;"><?php echo $bankcode_error; ?></span>
                                <?php endif?>
                            </div>
                            <div class="col">
                                <input onkeypress="validate(event)" maxlength="20" class="form-control" type="text" name="rek" placeholder="Payment Num." required="" value="<?php if (isset($_POST['transfer'])) {if(!isset($rek_error)) { echo $rek_tujuan;}}?>">
                                <?php if(isset($rek_error)): ?>
                                    <span style="color:#ff1637 !important; font-size:14px !important" ><?php echo $rek_error; ?></span>
                                <?php endif?>
                            </div>
                        </div>
                        
                        <input onkeypress="validate(event)" maxlength="10" class="form-control" type="text" name="amount" placeholder="Total payment" required="" readonly>
                        <div class="form-button mt-40px">
                            <button type="button" style="background-color:#E2D7D5 !important;" class="btn-setting btn-hvr-setting-main btn-white btn-hvr text-uppercase" >Preview
                                <span class="btn-hvr-setting btn-hvr-black">
                                     <span class="btn-hvr-setting-inner">
                                     <span class="btn-hvr-effect"></span>
                                     <span class="btn-hvr-effect"></span>
                                     <span class="btn-hvr-effect"></span>
                                     <span class="btn-hvr-effect"></span>
                                     </span>
                                    </span>
                            </button>
                            <a href="#" data-toggle="modal" data-target="#institutioncodelist" style="color:#ff1637"> Institution code list </a>
                        </div>
                        <div class="modal fade" id="institutioncodelist" role="dialog">
                            <div class="modal-dialog">
    
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
            
                                        <?php 
                                        echo "<table class='table' style='text-align:center !important;'>"; // start a table tag in the HTML
                                        echo "<thead><tr><th scope='col'>Institution code</th><th scope='col'>Institution name</th><th scope='col'>Institution logo</th></tr></thead>";
                                        echo "<tbody>";
                                        
                                        while($temp5 = mysqli_fetch_array($query_semua_nama_Institution)){   //Creates a loop to loop through results
                                            echo "<tr><td>" . $temp5['codelembaga'] . "</td><td>" . $temp5['name'] . "</td><td><img src='". $temp5['link'] . "'></td></tr>" ;  //$row['index'] the index here is a field name
                                        }
                                        echo "</tbody>";
                                        echo "</table>"; //Close the table in HTML
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                </div>
                
                
                
            </div>
        </div>
    </section>
  




    
    <footer class="p-half bg-black2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <ul class="footer-icons mb-4">
                    <li><a href="https://www.linkedin.com/in/yovan-adam-8780571a0/" class="wow fadeInUp"><i class="ti ti-facebook"></i> </a> </li>
                    <li><a href="https://www.facebook.com/yovan.julio.adam/" class="wow fadeInDown"><i class="ti ti-linkedin"></i> </a> </li>
                    <li><a href="https://instagram.com/yvnjlio" class="wow fadeInUp"><i class="ti ti-instagram"></i> </a> </li>
                    </ul>
                    <p class="copyrights mt-2 mb-2">© 2020 ATMOnline Made with brain by <a href="javascript:void(0)">Yovan Julio Adam</a></p>
                </div>
            </div>
        </div>
    </footer>
    


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
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


<!-- Google Map Api -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJScy7qJ156DWM8kJVG-ZrK0R7Kize2Jg"></script>
<script src="js/maps.min.js"></script>

<!-- Custom JS File -->
<script src="js/functions.js"></script>


<script src="https://unpkg.com/bootstrap-table@1.17.1/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>

</body>
</html>



