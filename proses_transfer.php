<?php 
    echo "123";
    
    include_once("function/helper.php");
    include_once("function/koneksi.php");


    if (isset($_POST['submit'])) {
        $bank_code123 = $_POST['bank_code'];
        $rek123 = $_POST['rek'];

    echo $bank_code123;
    echo $rek123;
    }
    

    echo "546";
    ?>