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
    <div class="container">
      <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="text-center">
          <h1>Data Peminjaman</h1>
          <table class="table table-borderd table-striped">
            <tr>
              <th>Id Peminjaman</th>
              <th>Jumlah Barang</th>
              <th>Tanggal Pinjam</th>
              <th>Tanggal Kembali</th>
              <th>Id Member</th>
              <th>Id Petugas</th>
              <th>Id Barang</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
            <?php
            include "koneksi.php";
            $tampil=mysqli_query($koneksi, "select * from peminjaman");
            foreach($tampil as $row)
            {
              ?>
               <tr>
                <td><?php echo "$row[id_peminjaman]"; ?></td>
                <td><?php echo "$row[jumlah_barang]"; ?></td>
                <td><?php echo "$row[tanggal_pinjam]"; ?></td>
                <td><?php echo "$row[tanggal_kembali]"; ?></td>
                <td><?php echo "$row[id_member]"; ?></td>
                <td><?php echo "$row[id_petugas]"; ?></td>
                <td><?php echo "$row[id_barang]"; ?></td>
                <td><?php echo "<a href='kembalikan.php?id=$row[id_peminjaman]'>Kembalikan</a>";?></td>
                <td><?php echo "<a href='updatepeminjaman.php?id=$row[id_peminjaman]'>UPDATE</a> | 
                <a href='deletepeminjaman.php?id=$row[id_peminjaman]'>DELETE</a>"; ?></td>
            </tr>
            <?php } ?>
            </table>
            <a href="tambahpeminjaman.php"> +Tambahkan Data Peminjaman </a>
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