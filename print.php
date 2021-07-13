<?php
include 'koneksi.php';
$id = $_GET['id'];
$buku = mysqli_query($koneksi, "select * from buku where id='$id'");
while ($data = mysqli_fetch_assoc($buku)) {
?>

    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

        <title><?php echo $data['namaBuku'] ?></title>
    </head>

    <body onload="window.print();">
        <div class="container mt-5">
            <p class="fw-bold">DETAIL DATA BUKU</p>
            <p>Nama Buku        : <?php echo $data['namaBuku'] ?></p>
            <p>Kategori Buku    : <?php echo $data['kategoriBuku'] ?></p>
            <p>Penerbit         : <?php echo $data['penerbit'] ?></p>
            <p>Harga            : <?php echo $data['harga'] ?></p>
           
            <p>Diskon : <?php 
                        $harga = $data['harga']; 
                        $diskon = $data['diskon'];
                        echo $nilai = ($diskon/100)*$harga        
                        ?>
                        (<?php
                        echo $diskon = $data['diskon'];
                        ?> %)</td>
           <p>Harga akhir  : Rp. <?php echo $harga = $data['harga']; ?> - Rp.
           
                        <?php $diskon = $data['diskon']; 
                            echo $jmlDisc = ($diskon/100)*$harga?> = Rp.
                        
                        <?php echo $hrgAkhir = $harga-$jmlDisc?>
                        <p>
                        
                       
                             
        </div>
    <?php
}
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>

    </html>