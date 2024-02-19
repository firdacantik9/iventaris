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
  $id_member=$_POST['id_member'];
  $nama=$_POST['nama'];
  $kelas=$_POST['kelas'];
  $no_hp=$_POST['no_hp'];
  
  $simpan = mysqli_query($koneksi, "update member set 
          
 
  password='$password',
  nama='$nama',
  kelas='$kelas',
  no_hp='$no_hp'

  where id_member='$id_member'");


          if($simpan) {
           header ("location:datamember.php");
          } else {
            echo "<div class='alert alert-danger'> Gagal Menambah Data Baru!</div>";
          }
}
?>
    <div class="container">
      <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="text-center">
          <h2> Form Input Barang </h2><br>
          <form method="post" action="">
            <?php
            $tampil=mysqli_query($koneksi, "select * from member where id_member='$_GET[id]'");
            foreach ($tampil as $row) {
            ?>
            <div class="form-group">
              <label><b> Id Barang </b></label>
              <input value="<?php echo $row['id_member']; ?>" class="form-control" placeholder="id member" name="id_member">
            </div>
            <div class="form-group">
              <label><b> Password </b></label>
              <input value="<?php echo $row['password']; ?>" type="text" class="form-control" placeholder="password" name="password">
            </div>
            <div class="form-group">
              <label><b> Nama Member </b></label>
              <input value="<?php echo $row['nama']; ?>" type="text" class="form-control" placeholder="nama member" name="nama">
            </div>
            <div class="form-group">
              <label><b> Kelas </b></label>
              <input value="<?php echo $row['kelas']; ?>" type="text" class="form-control" placeholder="kelas" name="kelas">
            </div>
            <div class="form-group">
              <label><b> No Hp </b></label>
              <input value="<?php echo $row['no_hp']; ?>" type="text" class="form-control" placeholder="no hp" name="no_hp">
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