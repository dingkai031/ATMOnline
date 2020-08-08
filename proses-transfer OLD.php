<?php 

    include_once("function/helper.php");
    include_once("function/koneksi.php");

    $tujuan = $_POST['tujuan'];
    $nominal = $_POST['nominal'];


    if (isset($_POST['submit']) ) {

        if ($tujuan == $_SESSION['rek']){
            ?><script> alert("Maaf rekening tujuan tidak boleh sama dengan rekening pemilik, Silahkan coba lagi");</script> 
            <?php
            header('Refresh: 0.001; URL=http://localhost/ATM/index.php?page=transfer');
        }else {
            if (isset($tujuan) && isset($nominal)) {
                $querytujuan = mysqli_query($koneksi, "SELECT * FROM user WHERE rekening='$tujuan'");
                if (mysqli_num_rows($querytujuan) == 0 ) {
                    ?><script> alert("Maaf, No.Rekening tidak terdaftar atau keterangan belum lengkap, Silahkan coba lagi.");</script> 
                    <?php
                    header('Refresh: 0.001; URL=http://localhost/ATM/index.php?page=transfer');
                    }else {
                        $querypemilik = mysqli_query($koneksi, "SELECT * FROM user WHERE name='$nama'");
                        $pemilik = mysqli_fetch_assoc($querypemilik);
                        $akuntujuan = mysqli_fetch_assoc($querytujuan);
                        $namatujuan = $akuntujuan['name'];
                        $idtujuan = $akuntujuan['user_id'];
                        $tanggal = date("Y-m-d H:i");
                        if ($pemilik['saldo'] <= $nominal) {
                            ?><script> alert("Maaf, Saldo anda tidak cukup");</script> 
                            <?php
                            header('Refresh: 0.001; URL=http://localhost/ATM/index.php?page=transfer');
                        }else {
                            $saldopemilikakhir = $pemilik['saldo'] - $nominal ;
                            $saldotujuanakhir = $akuntujuan['saldo'] + $nominal;
                            $nominalmutasinambah = "+ ".$nominal;
                            $nominalmutasingurang = "- ".$nominal;
                            $ketberkurang = "Transfer ke ".$namatujuan;
                            $ketbertambah = "Nerima dari ".$nama;
                            if (mysqli_query($koneksi, "UPDATE user SET saldo='$saldopemilikakhir' WHERE name='$nama'") && mysqli_query($koneksi, "UPDATE user SET saldo='$saldotujuanakhir' WHERE name='$namatujuan'")){
                                mysqli_query($koneksi, "INSERT INTO transaksi (mutasi, waktu_tanggal, user_id, tujuan ) VALUES ('$nominalmutasingurang','$tanggal', '$user_id', '$ketberkurang')");
                                mysqli_query($koneksi, "INSERT INTO transaksi (mutasi, waktu_tanggal, user_id, tujuan ) VALUES ('$nominalmutasinambah','$tanggal', '$idtujuan', '$ketbertambah')");
                                $_SESSION['saldo'] = $saldopemilikakhir;
                                ?><script> alert("Transfer sukses!");</script> 
                                <?php
                                header('Refresh: 0.001; URL=http://localhost/ATM/index.php');
                            } 
                        }
                    }
                }
        }
    }
?>