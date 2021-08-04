<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","sewa-mobil");
if (isset($_POST["action"])) {
  $id_mb = $_POST["id_mb"];
  $nm_mb = $_POST["nm_mb"];
  $merk = $_POST["merk"];
  $jenis = $_POST["jenis"];
  $warna = $_POST["warna"];
  $thn_pb = $_POST["thn_pb"];
  $biaya_per_hari = $_POST["biaya_per_hari"];
  $action = $_POST["action"];
  $tersewa ='0';

  if ($_POST["action"] == "insert") {
    $path = pathinfo($_FILES["picture"]["name"]);
    $extensi = $path["extension"];
    $filename = $id_mb."-".rand(1,1000).".".$extensi;
	$id_kr = $_SESSION["session_karyawan"]["id_kr"];
	$tersewa = '0';
    $sql = "insert into mobil values ('$id_mb','$nm_mb','$id_kr','$merk','$jenis','$warna','$thn_pb','$biaya_per_hari','$filename','$tersewa')";
    if (mysqli_query($koneksi,$sql)) {
      
      move_uploaded_file($_FILES["picture"]["tmp_name"],"img_mobil/$filename");
      $_SESSION["message"] = array(
        "type" => "success",
        "message" => "Data Uploaded"
      );
    }else {
      
      $_SESSION["message"] = array(
        "type" => "danger",
        "message" => mysqli_error($koneksi)
      );
    }
    header("location:template.php?page=mobil");
  }else if ($_POST["action"] == "update") {
    if (!empty($_FILES["picture"]["name"])){
      
      $sql = "select * from mobil where id_mb='$id_mb'";
      $result = mysqli_query($koneksi,$sql);
      $hasil = mysqli_fetch_array($result);
      $id_kr = $_SESSION["session_karyawan"]["id_kr"];
      if (file_exists("img_mobil/".$hasil["picture"])) {
        unlink("img_mobil/".$hasil["picture"]);
      }

      
      $path = pathinfo($_FILES["picture"]["name"]);
      $extensi = $path["extension"];
      $filename = $id_mb."-".rand(1,1000).".".$extensi;
	 
     
      $sql = "update mobil set nm_mb='$nm_mb',id_kr='$id_kr', merk='$merk', jenis='$jenis',warna='$warna',thn_pb='$thn_pb',biaya_per_hari='$biaya_per_hari',picture='$filename', tersewa='$tersewa' where id_mb='$id_mb'";

      if (mysqli_query($koneksi,$sql)) {
        
        move_uploaded_file($_FILES["picture"]["tmp_name"],"img_mobil/$filename");
        $_SESSION["message"] = array(
          "type" => "success",
          "message" => "Data Uploaded"
        );
      }else {
        
        $_SESSION["message"] = array(
          "type" => "danger",
          "message" => mysqli_error($koneksi)
        );
      }
    }else {
      $id_kr = $_SESSION["session_karyawan"]["id_kr"];
	  $filename = "img_mobil/".$id_mb["picture"];
      $sql = "update mobil set nm_mb='$nm_mb',id_kr='$id_kr', merk='$merk', jenis='$jenis',warna='$warna',thn_pb='$thn_pb',biaya_per_hari='$biaya_per_hari',tersewa='$tersewa'  where id_mb='$id_mb'";
      if (mysqli_query($koneksi,$sql)) {
       
        $_SESSION["message"] = array(
          "type" => "success",
          "message" => "Data Edited"
        );
      }else{
        $_SESSION["message"] = array(
          "type" => "danger",
          "message" => mysqli_error($koneksi)
        );
      }
    }
    header("location:template.php?page=mobil");
  }
}
if (isset($_GET["hapus"])) {
  $id_mb = $_GET["id_mb"];
  
  $sql = "select * from mobil where id_mb='$id_mb'";
 
  $result = mysqli_query($koneksi,$sql);
  
  $hasil = mysqli_fetch_array($result);
  if (file_exists("img_mobil/".$hasil["picture"])) {
    unlink("img_mobil/".$hasil["picture"]);
   
  }
  $sql = "delete from mobil where id_mb = '$id_mb'";

  if (mysqli_query($koneksi,$sql)) {
    
    move_uploaded_file($_FILES["picture"]["tmp_name"],"img_mobil/$filename");
    $_SESSION["message"] = array(
      "type" => "success",
      "message" => "Data Deleted"
    );
  }else {
    
    $_SESSION["message"] = array(
      "type" => "danger",
      "message" => mysqli_error($koneksi)
    );
  }
  header("location:template.php?page=mobil");
}
?>
