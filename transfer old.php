<div id="container-user-akses" >
    <form action="<?php echo BASE_URL."index.php?page=proses-transfer" ?>" method="post" enctype="multipart/form-data" style="text-align:center">
        <h1>TRANSFER</h1> <br><br>
        <div class="element-form">
            <label   for="tujuan">Alamat Tujuan </label>
            <input  maxlength="20" class="datainfo angka" type="text" name="tujuan" ><br>
        </div>
        <div class="element-form">
            <label  for="nominal">Nominal Transfer </label>
            <input maxlength="9" class="datainfo angka" type="text" name="nominal"><br>
        </div>
        <div class="element-form">
            <input  type="submit" name="submit"><br>
        </div>
    </form>
</div>

            
            
            
