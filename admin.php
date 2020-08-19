<?php 
    session_start();
    include_once("function/helper.php");
    include_once("function/koneksi.php");
    
    
    
//C------------------------------CHECK APAKAH ADA USER, JIKA TIDAK ADA, TIDAK BISA AKSES PERSONAL DASHBOARD-----------------------
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
    $nama = $_SESSION['nama'];

    
?>

<?php
//--------------------------------------------PROSES TRANSFER---------------------------------------------------------------

    include_once("function/helper.php");
    include_once("function/koneksi.php");

?>


<?php 
//----------------------history transaksi---------------------------
    $query_history = mysqli_query($koneksi, "SELECT waktu_tanggal,keterangan FROM transaksi WHERE user_id='$user_id' ORDER BY Month(waktu_tanggal) ASC");


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
//--------------------------SEMUA DATA user---------------
    $query_semua_user = mysqli_query($koneksi, "SELECT * FROM user WHERE level = 'user'");
?>



<?php 
//------------------------------DELETE------------------------

if (isset($_GET['delete'])) {

    $acuan = $_GET['delete'];

    $query_delete = "DELETE FROM user WHERE hash='$acuan'";
    
    mysqli_query($koneksi,$query_delete);

}





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
                        <li class="nav-item menu__item"> <a href="#userlist" class="scroll nav-link menu__link">User list</a>
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

    
    <section id="userlist" class="bg-light-gray" style="margin-bottom:50px !important;margin-top:0px !important;padding-bottom:0px !important">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-title mb-2rem wow fadeIn" data-wow-delay="300ms">
                        <h2> User List </h2>
                    </div>
                </div>
            </div>
            <div class="row d-block">
                <div>
                    <?php 
                        echo "<table  data-toggle='table' data-pagination='true' data-search='true' data-page-list='[10, 16, 32, 50, all]'>"; // start a table tag in the HTML
                        echo "<thead style='color:#ffffff !important;background-color:#37474F !important'><tr><th >No</th><th >Name</th><th>Email</th><th>Phone</th><th>Bank_Code</th><th>Account Number</th><th>Balance</th><th>Action</th></tr></thead>";
                        echo "<tbody>";
                        $i = 1;
                                        
                        while($temp2 = mysqli_fetch_array($query_semua_user)){   //Creates a loop to loop through results
                            echo "<tr>
                            <td>" . $i . "</td>
                            <td>" . $temp2['name'] . "</td>
                            <td>". $temp2['email'] . "</td>
                            <td>". $temp2['phone'] . "</td>
                            <td>" . $temp2['bankcode'] ."</td>
                            <td>" . $temp2['rekening'] . "</td>
                            <td>". $temp2['saldo'] ."</td>
                            <td>" . "<a href='admin.php?delete=". $temp2['hash'] . "'>Delete</a> <a href=' update.php?checked=". $temp2['hash'] . "'>Update</a></td>
                            
                            
                            </tr>";  //$row['index'] the index here is a field name
                            $i++;
                        }
                        echo "</tbody>";
                        echo "</table>"; //Close the table in HTML
                    ?>
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



