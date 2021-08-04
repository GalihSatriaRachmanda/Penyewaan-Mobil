<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","sewa-mobil");
if (isset($_POST["action"])) {
  $id_pl = $_POST["id_pl"];
  $nama_pl = $_POST["nama_pl"];
  $kontak = $_POST["kontak"];
  $alamat_pl = $_POST["alamat_pl"];
  $username = $_POST["username"];
  $password = md5($_POST["password"]);
  $action = $_POST["action"];

  if ($_POST["action"] == "insert") {
    $sql = "insert into pelanggan values ('$id_pl','$nama_pl','$alamat_pl','$kontak','$username','$password')";
    if (mysqli_query($koneksi,$sql)) {
      // JIKA BERHASIL
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
    header("location:template.php?page=pelanggan");
  }elseif ($_POST["action"] == "update") {
      // JIKA EDIT
      $sql = "select * from pelanggan where id_pl='$id_pl'";
      $result = mysqli_query($koneksi,$sql);
      $hasil = mysqli_fetch_array($result);
    // PERINTAH UPDATE
    $sql = "update pelanggan set nama_pl='$nama_pl', kontak='$kontak',alamat_pl='$alamat_pl',username='$username',password='$password' where id_pl='$id_pl'";

    if (mysqli_query($koneksi,$sql)) {
      // JIKA BERHASIL
      $_SESSION["message"] = array(
        "type" => "success",
        "message" => "Data Uploaded"
      );
    }else {
      // JIKA GAGAL
      $_SESSION["message"] = array(
        "type" => "danger",
        "message" => mysqli_error($koneksi)
      );
    }
    header("location:template.php?page=pelanggan");
  }
}
  if (isset($_GET["hapus"])) {
    $id_pl = $_GET["id_pl"];
    $sql = "select * from pelanggan where id_pl='$id_pl'";
    //eksekusi query
    $result = mysqli_query($koneksi,$sql);
    // konversi ke array
    $hasil = mysqli_fetch_array($result);

  $sql = "delete from pelanggan where id_pl = '$id_pl'";

  if (mysqli_query($koneksi,$sql)) {
    // JIKA BERHASIL
    $_SESSION["message"] = array(
      "type" => "success",
      "message" => "Data Deleted"
    );
  }else {
    // JIKA GAGAL
    $_SESSION["message"] = array(
      "type" => "danger",
      "message" => mysqli_error($koneksi)
    );
  }
  header("location:template.php?page=pelanggan");
}
?>
