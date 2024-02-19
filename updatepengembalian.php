<?php
session_start();
if (!isset($_SESSION["id_petugas"])){
  header("location:login.php");
}else {
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>e-Commerce</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
  </head>
  <body>
    <!-- Start your project here-->
    <nav class="navbar navbar-expand-lg navbar-light bg-warning mb-3">
 <a class="navbar-brand" href="#"> Lab RPL AKSATA</a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" datatarget="#navbarNavDropdown" aria-controls="navbarNavDropdown" ariaexpanded="false" aria-label="Toggle navigation">
 <span class="navbar-toggler-icon"></span>
 </button>
 <div class="collapse navbar-collapse" id="navbarNavDropdown">
 <ul class="navbar-nav">
 <li class="nav-item active">
 <a class="nav-link" href="index.html">Home</a>
 </li>
 <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expended="false">Master Data</a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
      <li>
        <a class="dropdown-item" href="databarang.php"> Data Barang </a>
      </li> 
      <li>
        <a class="dropdown-item" href="datamember.php"> Data Member </a>
      </li> 
    </ul>
    <li class="nav-item dropdown">
 <a class="nav-link dropdown-toggle" 
          href="#"
          id="navbarDropdown"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false">
         Transaksi
        </a>

        <ul class="dropdown-menu" aria-lablledby="navbarDropdown">
 </li>
         <a class="dropdown-item" href="datapeminjaman.php">Data Peminjaman </a>
         </li>
         <li>
         <a class="dropdown-item" href="datapengembalian.php">Data Pengembalian </a>
         </li>
        </ul>
        </li>
        <li class="nav-item active">
 <a class="nav-link" href="logout.php">Logout</a>
</li>
 </ul>
 </div>
</nav>
<?php
include "koneksi.php";
if (isset($_POST["ok"]))
{
  $id_peminjaman=$_POST['id_peminjaman'];
  $jumlah_barang=$_POST['jumlah_barang'];
  $tanggal_pinjam=$_POST['tanggal_pinjam'];
  $tanggal_kembali=$_POST['tanggal_kembali'];
  $terlambat=$_POST['terlambat'];
  $jumlah_denda=$_POST['jumlah_denda'];


  $simpan = mysqli_query($koneksi, "update pengembalian set 
          
  jumlah_barang='$jumlah_barang',
  tanggal_pinjam='$tanggal_pinjam',
  tanggal_kembali='$tanggal_kembali',
  terlambat='$terlambat',
  jumlah_denda='$jumlah_denda'

 where id_peminjaman='$id_peminjaman'");

          if($simpan) {
           header ("location:datapengembalian.php");
          } else {
            echo "<div class='alert alert-danger'> Gagal Menambah Data Baru!</div>";
          }
}
?>
    <div class="container">
      <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="text-center">
          <h2> Form Input Pengembalian </h2><br>
          <form method="post" action="">
            <?php
            $tampil=mysqli_query($koneksi, "select * from pengembalian where id_peminjaman='$_GET[id]'");
            foreach ($tampil as $row) {
            ?>
            <div class="form-group">
              <label><b> Id Peminjaman </b></label>
              <input value="<?php echo $row['id_peminjaman']; ?>" class="form-control" placeholder="id peminjamanan" name="id_peminjaman">
            </div>
            <div class="form-group">
              <label><b> Jumlah Barang </b></label>
              <input value="<?php echo $row['jumlah_barang']; ?>" type="text" class="form-control" placeholder="jumlah barang" name="jumlah_barang">
            </div>
            <div class="form-group">
              <label><b> Tanggal Pinjam </b></label>
              <input value="<?php echo $row['tanggal_pinjam']; ?>" type="date" class="form-control" placeholder="tanggal pinjam" name="tanggal_pinjam">
            </div>
            <div class="form-group">
              <label><b> Tanggal Kembali </b></label>
              <input value="<?php echo $row['tanggal_kembali']; ?>" type="date" class="form-control" placeholder="tanggal kembali" name="tanggal_kembali">
            </div>
            <div class="form-group">
              <label><b> Terlambat </b></label>
              <input value="<?php echo $row['terlambat']; ?>" type="text" class="form-control" placeholder="terlambat" name="terlambat">
            </div>
            <div class="form-group">
              <label><b> Jumlah Denda</b></label>
              <input value="<?php echo $row['jumlah_denda']; ?>" type="text" class="form-control" placeholder="jumlah denda" name="jumlah_denda">

            </div><br>
            <button type="submit" name="ok" class="btn btn-success"> SIMPAN </button>
            <button type="reset" class="btn btn-danger"> CANCEL </button>
            <?php } ?>
</form>
        </div>
      </div>
    </div>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  </body>
</html>
<?php
}
?>