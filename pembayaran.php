<?php

    $submit = false;
    $error_msg = '';
    if (isset($_POST['proses'])) {
        $submit = true;
        $nama_barang = trim($_POST['nama_barang']);
        $harga_satuan = $_POST['harga_satuan'];
        $jumlah_pembelian = $_POST['jumlah_pembelian'];


        if ($nama_barang === '' || $harga_satuan === '' || $jumlah_pembelian === '') {
            $submit = false;
            $error_msg = "Pastikan input tidak ada yang kosong!";
        }elseif($harga_satuan < 0 || $jumlah_pembelian <= 0){
            $submit = false;
            $error_msg = "Pastikan angka pada input harga satuan dan jumlah pembelian tidak minus!";
        }


        if ($submit) {
            $diskon_persen = null;

            $total_harga = $harga_satuan * $jumlah_pembelian;

            if ($total_harga >= 500000) {
                $diskon = $total_harga * 0.2;
                $total_harga -= $diskon;
                $diskon_persen = 20;
            } elseif ($total_harga >= 250000) {
                $diskon = $total_harga * 0.1;
                $total_harga -= $diskon;
                $diskon_persen = 10;
            } else {
                $diskon_persen = 0;
            }
        }
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if (!$submit): ?>
        <p><?php echo $error_msg ?></p>
    <?php endif; ?>
    <form action="" method="post">
        <label>Nama Barang: </label>
        <input type="text" name="nama_barang" id="nama_barang">
        <br>
        <label>Harga Satuan: </label>
        <input type="number" name="harga_satuan" id="harga_satuan" >
        <br>
        <label>Jumlah Pembelian: </label>
        <input type="number" name="jumlah_pembelian" id="jumlah_pembelian">

        <button type="submit" value="kirim" name="proses">submit</button>
    </form>

    <?php
        if ($submit) {
    ?>
            <p>Nama Barang : <?php echo $nama_barang; ?></p>
            <p>Harga Satuan : <?php echo $harga_satuan; ?></p>
            <p>Jumlah Pembelian : <?php echo $jumlah_pembelian; ?></p>

            <hr>
            <p>Diskon : <?php echo $diskon_persen . '%'; ?></p>
            <p>Total harga : <?php echo $total_harga; ?></p>
    <?php
        } else {
    ?>
            <p>Nama Barang : </p>
            <p>Harga Satuan : </p>
            <p>Jumlah Pembelian : </p>

            <hr>
            <p>Diskon :</p>
            <p>Total harga : </p>
            

    <?php
        }
    ?>

</body>
</html>