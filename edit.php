<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css"> -->

    <title>Data Toko</title>
</head>

<body>
    <!-- nav start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Data toko</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="#">Tambah Buku</a>
                    <a class="nav-link" href="#">Features</a>
                    <a class="nav-link" href="#">Pricing</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- detail start -->
    <?php
    //memanggil file config.php
    include 'koneksi.php';
    //menangkap id yang di kirimkan melalui button detail
    $id = $_GET['id'];
    //melakukan quey untuk mendapatkan data mahasiswa berdasarkan $id
    $buku = mysqli_query($koneksi, "select * from buku where id='$id'");
    
    while ($data = mysqli_fetch_assoc($buku)) {
    ?>
        <div class="container mt-5">
            <p><a href="main.php">Home</a>/ Edit buku / <?php echo $data['namaBuku'] ?></p>
            <div class="card">
                <div class="card-header">
                    <p class="fw-bold">Edit Data Buku</p>
                </div>
                <div class="card-body fw-bold">
                    <!-- membuat form dengan method post untuk memanggil file update.php -->
                    <form method="post" action="update.php">
                        <!-- input yang disembunyikan (hidden) untuk menyimpan id mahasiswa -->
                        <div class="mb-3">
                            <input type="hidden" class="form-control" name="id" value="<?php echo $data['id']; ?>">
                        </div>
                        <!-- input nim -->
                        <div class="mb-3">
                            <label for="Nama" class="form-label">Nama Buku</label>
                            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Anda" name="nama" value="<?php echo $data['namaBuku']; ?>">
                        </div>
                        <!-- input nim -->
                        <div class="mb-3">
                            <label for="NIM" class="form-label">Kategori Buku</label>
                            <input type="text" class="form-control" id="NIM" placeholder="Masukkan NIM Anda" name="kategori" value="<?php echo $data['kategoriBuku']; ?>">
                        </div>
                        <!-- input alamat -->
                        <div class="mb-3">
                            <label for="Alamat" class="form-label">Penerbit</label>
                            <input type="text" class="form-control" id="Alamat" placeholder="Masukkan Alamat Anda" name="penerbit" value="<?php echo $data['penerbit']; ?>">
                        </div>
                        <!-- input nim -->
                        <div class="mb-3">
                            <label for="Nama" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Anda" name="harga" value="<?php echo $data['harga']; ?>">
                            <!-- input nim -->
                        <div class="mb-3">
                            <label for="Nama" class="form-label">Diskon</label>
                            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Anda" name="diskon" value="<?php echo $data['diskon']; ?>">
                        <!-- Button update data  -->
                        <button type="submit" class="btn btn-primary" value="SIMPAN">Update</button>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <!-- edit end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

