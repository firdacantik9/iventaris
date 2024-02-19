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
 <a class="nav-link dropdown-toggle" 
          href="#"
          id="navbarDropdown"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false">
          Master Dataa
        </a>

        <ul class="dropdown-menu" aria-lablledby="navbarDropdown">
 </li>
         <a class="dropdown-item" href="databarang.php">Data Barang </a>
         </li>
         <li>
         <a class="dropdown-item" href="datamember.php">Data Member </a>
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
  

  $simpan=mysqli_query($koneksi, "insert into member set
  id_member='$id_member',
  password='$password',
  nama='$nama',
  kelas='$kelas',
  no_hp='$no_hp'");

  if ($simpan) {
    header ("location:datamember.php");
  } else {
    echo "<div class='alert alert-danger' >Gagal menambah data baru!</div>";   
  }
}
?>
    <div class="container">
      <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="text-center">
          <h2> Form Input Member  </h2>
       <form method="post" action="">
       <div class="form-group">
      <label><b>Id Member </b></label>
      <input type="text" class="form-control" placeholder="id member" name="id_member">
      </div>
      <div class="from-group">
      <label><b>Password </b></label>
      <input type="text" class="form-control" placeholder="password" name="password">
      </div>
      <div class="from-group">
      <label><b>Nama Member </b></label>
      <input type="text" class="form-control" placeholder="nama member" name="nama">
      </div>
      <div class="from-group">
      <label><b>Kelas Member </b></label>
      <input type="text" class="form-control" placeholder="nama member" name="kelas">
      </div>
      <div class="from-group">
      <label><b>No Hp </b></label>
      <input type="text" class="form-control" placeholder="no hp" name="no_hp">
      </div>
      <br>
      <button type="submit" name="ok" class="btn btn-success">SIMPAN</button>
      <button type="reset" class="btn btn-danger">CANCEL</button>   
</from>

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