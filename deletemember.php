<?php
include "koneksi.php";
$hapus = mysqli_query($koneksi, "delete from member where id_member='$_GET[id]' ");
header("location:datamember.php");
?>