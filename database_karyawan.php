<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","sewa-mobil");
if (isset($_POST["action"])) {
  $id_kr = $_POST["id_kr"];
  $nama_kr = $_POST["nama_kr"];
  $alamat_kr = $_POST["alamat_kr"];
  $kontak = $_POST["kontak"];
  $username = $_POST["username"];
  $password = md5($_POST["password"]);
  $action = $_POST["action"];

  if ($_POST["action"] == "insert") {
    $sql = "insert into karyawan values ('$id_kr','$nama_kr','$alamat_kr','$kontak','$username','$password')";
    if (mysqli_query($koneksi,$sql)) {
      
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
    header("location:template.php?page=karyawan");
  }else if ($_POST["action"] == "update") {
      
      $sql = "select * from karyawan where id_kr='$id_kr'";
      $result = mysqli_query($koneksi,$sql);
      $hasil = mysqli_fetch_array($result);
    }
    
    $sql = "update karyawan set nama_kr='$nama_kr',alamat_kr='$alamat_kr',kontak='$kontak',username='$username',password='$password' where id_kr='$id_kr'";

    if (mysqli_query($koneksi,$sql)) {
      
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
    header("location:template.php?page=karyawan");
  }

  if (isset($_GET["hapus"])) {
    $id_kr = $_GET["id_kr"];
    $sql = "select * from karyawan where id_kr='$id_kr'";
    
    $result = mysqli_query($koneksi,$sql);
    
    $hasil = mysqli_fetch_array($result);

  $sql = "delete from karyawan where id_kr = '$id_kr'";

  if (mysqli_query($koneksi,$sql)) {
    
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
  header("location:template.php?page=karyawan");
}
?>
