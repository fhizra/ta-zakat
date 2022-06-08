<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
    <div>
    <label for="">Nama</label>   
    <input type="text" name="nama" id="">
    <br>
    <?php 
        for ($i=1; $i <= 6 ; $i++) { 
            ?>
                <label for="">Nilai <?= $i; ?></label>
    <input type="text" name="nilai<?= $i; ?>" id="">
    <br>
            <?php
        }
    ?>
    <button type="submit" name="simpan">SIMPAN</button>
    </div>
    </form>
</body>
</html>
<?php 
    if (isset($_POST['simpan'])) {
        $nama = $_POST['nama'];
        for ($i=1; $i <= 6 ; $i++) { 
            $n = $_POST["nilai$i"];
            echo "<script>alert('Nama : $nama Nilai Ke : $i bobot : $n')</script>";
        }
        ?>
        <?php
    }
?>