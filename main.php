<?php 
session_start();
// if the user is not logged in, then redirect to the logout page
if(!isset($_SESSION["id"])){
    header("location: index.php");
    exit();
}
?>
<!DOCTYPE html> 
<html lang="en"> 
<head> <!-- Required meta tags --> 
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- Bootstrap CSS --> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
  <title>StoreTara</title> 
</head> 
<body>
<!-- nav start -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">TOKO BUKU</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="#">Tambah Buku</a>
                    <a class="nav-link" href="#">Features</a>
                    <a class="nav-link" href="#">Pricing</a>
                </div>
                <div class="col-md-3">
                    <a href="logout.php" class="pull-right">
                    <button class="btn btn-warning">Logout</button>
                    </a>
            </div>
            </div>
        </div>
    </nav>
    <!-- nav end -->

    <!-- modal start -->
    <div class="container data-mahasiswa mt-5">
        <!-- modal -->
        <!-- button memunculkan modal -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahData">
            Tambah Data
        </button>

        <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- membuat form dengan method post untuk memanggil file store.php -->
                    <form method="post" action="create.php" name="form">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahDataLabel">Input Buku</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">                          
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Buku</label>
                                <input type="text" class="form-control" id="Nama" placeholder="Masukkan Nama Buku" name="Namabuku" required>
                            </div>                            
                            <div class="mb-3">
                                <label for="NIM" class="form-label">Kategori Buku</label>
                                <input type="text" class="form-control" id="Kategori" placeholder="Masukkan Kategori" name="Kategori" required>
                            </div>                            
                            <div class="mb-3">
                                <label for="Penerbit" class="form-label">Penerbit</label>                                
                                <input type="text" class="form-control" id="Penerbit" placeholder="Masukkan Penerbit Buku" name="Penerbit" required></input>
                            </div>
                            <div class="mb-3">
                                <label for="Harga" class="form-label">Harga</label>                                
                                <input type="text" class="form-control" id="Harga" placeholder="Masukkan Harga Buku" name="Harga" required></input>
                            </div>
                            <div class="mb-3">
                                <label for="Diskon" class="form-label">Discount</label>                                
                                <input type="text" class="form-control" id="Disc." placeholder="Masukkan Presentase Diskon (Dalam %)" name="Diskon" required></input>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- Button close modal -->
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <!-- Button tambah data  -->
                            <button type="submit" class="btn btn-primary" value="SIMPAN">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal end -->

    <!-- Table start  -->
    <div class="container data-mahasiswa mt-5">
        <table class="table table-striped" id="tableMahasiswa">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Buku</th>
                    <th scope="col">Kategori Buku</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Diskon</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //memanggil config.php yang sudah dibuat
                include 'koneksi.php';

                //membuat variable nomor mahasiswa yang akan di increment
                $no = 1;

                //melakukan query
                $buku = mysqli_query($koneksi, "SELECT * FROM buku");

                //looping data mahasiswa
                while ($data = mysqli_fetch_array($buku)) {
                ?>
                    <!-- menampilkan nomor baris $no++ -->
                    <tr>

                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['namaBuku']; ?></td>
                        <td><?php echo $data['kategoriBuku']; ?></td>
                        <td><?php echo $data['penerbit']; ?></td>
                        <td><?php echo $data['harga']; ?></td>

                        <td>Rp. <?php 
                        $harga = $data['harga']; 
                        $diskon = $data['diskon'];
                        echo $nilai = ($diskon/100)*$harga        
                        ?>
                        (<?php
                        echo $diskon = $data['diskon'];
                        ?> %)</td>
                       



                        <!-- untuk aksi data mahasiswa -->
                        <td>
                            <!-- aksi edit delete, btn-sm  -->
                            <a href="detail.php?id=<?php echo $data['id']; ?>" class="btn btn-success btn-sm text-white">DETAIL</a>
                            <!-- link untuk masuk ke halaman edit -->
                            <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm text-white">EDIT</a>
                            <!-- link untuk delete -->
                            <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ini?')">DELETE</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- table end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tableMahasiswa').DataTable();
        });
    </script>
  <!-- <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="alert alert-success" role="alert">
          Login Successful !
        </div>
      </div>
      <div class="col-md-3">
        <a href="logout.php" class="pull-right">
          <button class="btn btn-warning">Logout</button>
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12"><h1>Welcome</h1></div>
    </div>
  </div> -->
  <!-- Optional JavaScript --> <!-- jQuery first, then Popper.js, then Bootstrap JS --> 
  
</body> 
</html>
