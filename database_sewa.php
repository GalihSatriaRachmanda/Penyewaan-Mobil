<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","sewa-mobil");
if (isset($_GET["sewa"])) {
  $id_mb = $_GET["id_mb"];
  $sql = "select * from mobil where id_mb='$id_mb'";
  $result = mysqli_query($koneksi,$sql);
  $hasil = mysqli_fetch_array($result);
  if (!in_array($hasil,$_SESSION["session_sewa"])) {
    array_push($_SESSION["session_sewa"],$hasil);
	
  }
  header("location:template_pelanggan.php?page=list_mobil");
}
if (isset($_GET["tsr"])) {
	$koneksi = mysqli_connect("localhost","root","","sewa-mobil");
	$id_mb = $_GET["id_mb"];
	$sql = "update mobil set tersewa = '0' where id_mb='$id_mb'";
	$sql1 = "delete from sewa where id_mb = '$id_mb'";
	header("location:template.php?page=mobil");
	mysqli_query($koneksi,$sql);
	mysqli_query($koneksi,$sql1);
}
if (isset($_GET["checkout"])) {
  $koneksi = mysqli_connect("localhost","root","","sewa-mobil");
  foreach ($_SESSION["session_sewa"] as $hasil) {
	$biaya += $hasil["biaya_per_hari"]; 
	$id_mb = $hasil["id_mb"];
	$sql1 = "update mobil set tersewa = '1' where id_mb='$id_mb'";
	mysqli_query($koneksi,$sql1);
  }
  $id_sw = rand(1,100).date("dmY");
  $id_kr = $hasil["id_kr"];
  $id_pl = $_SESSION["session_pelanggan"]["id_pl"];
  if(isset($_POST['tgl_sewa'])) $tgl_sewa=$_POST['tgl_sewa'];
  if(isset($_POST['tgl_kembali'])) $tgl_kembali=$_POST['tgl_kembali'];
  $id_mb = $hasil["id_mb"];
  $diff = abs(strtotime($tgl_kembali) - strtotime($tgl_sewa));
  $years = floor($diff / (365*60*60*24));
  $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
  $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
  
  $biaya_sewa = $days*$biaya; 
  $sql = "insert into sewa values('$id_sw','$id_mb','$id_kr','$id_pl','$tgl_sewa','$tgl_kembali','$biaya_sewa')";
  	  
  
    if (!mysqli_query($koneksi,$sql)) echo mysqli_error($koneksi);
	$_SESSION["session_sewa"] = array();
	
	
    header("location:template_pelanggan.php?page=nota&id_sw=$id_sw");
   
  }
  if (isset($_GET["hapus"])) {
    $id_mb = $_GET["id_mb"];
    $index = array_search($id_mb,array_column($_SESSION["session_sewa"],"id_mb"));
    array_splice($_SESSION["session_sewa"],$index,1);
    header("location:template_pelanggan.php?page=list_sewa");
  }
?>
