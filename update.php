<?php
//include con database
include './koneksi.php';

//mengambil data yang di kirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$penerbit = $_POST['penerbit'];
$harga = $_POST['harga'];
$diskon = $_POST['diskon'];

//update data ke database
mysqli_query($koneksi, "UPDATE buku SET namaBuku='$nama', kategoriBuku='$kategori',penerbit='$penerbit',harga= '$harga',diskon='$diskon' WHERE id='$id'");
//return ke halaman awal
header("location: main.php");