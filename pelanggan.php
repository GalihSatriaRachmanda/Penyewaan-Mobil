<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script type="text/javascript">
      function Add() {
        document.getElementById('action').value = "insert";

        document.getElementById("id_pl").value = "";
        document.getElementById("nama_pl").value = "";
        document.getElementById("alamat_pl").value = "";
        document.getElementById("kontak").value = "";
        document.getElementById("username").value = "";
        document.getElementById("password").value = "";
      }
      function Edit(index) {
        document.getElementById('action').value = "update";

        var table = document.getElementById("table_pelanggan");

        var id_pl = table.rows[index].cells[0].innerHTML;
        var nama_pl = table.rows[index].cells[1].innerHTML;
        var alamat_pl = table.rows[index].cells[2].innerHTML;
        var kontak = table.rows[index].cells[3].innerHTML;
        var username = table.rows[index].cells[4].innerHTML;
        var password = table.rows[index].cells[5].innerHTML;

        document.getElementById("id_pl").value = id_pl;
        document.getElementById("nama_pl").value = nama_pl;
        document.getElementById("alamat_pl").value = alamat_pl;
        document.getElementById("kontak").value = kontak;
        document.getElementById("username").value = username;
        document.getElementById("password").value = password;
      }
    </script>
  </head>
  <body>
    <div class="card col-sm-12">
      <div class="card-header">
        <h4>User</h4>
      </div>
      <div class="card-body">
        <?php if (isset($_SESSION["message"])): ?>
          <div class="alert alert-<?=($_SESSION["message"]["type"])?>">
            <?php echo $_SESSION["message"]["message"]; ?>
            <?php unset ($_SESSION["message"]); ?>
          </div>
        <?php endif; ?>
        <?php
        $koneksi = mysqli_connect("localhost","root","","sewa-mobil");
        $sql = "select * from pelanggan";
        $result = mysqli_query($koneksi,$sql);
        $count = mysqli_num_rows($result);
        ?>

        <?php if ($count == 0): ?>
          <div class="alert alert-danger">
            Data belum tersedia!
          </div>
        <?php else: ?>
          <table class="table" id="table_pelanggan">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kontak</th>
                <th>username</th>
                <th>Password</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($result as $hasil):?>
                <tr>
                  <td><?php echo $hasil ["id_pl"]; ?></td>
                  <td><?php echo $hasil ["nama_pl"]; ?></td>
                  <td><?php echo $hasil ["alamat_pl"]; ?></td>
                  <td><?php echo $hasil ["kontak"]; ?></td>
                  <td><?php echo $hasil ["username"]; ?></td>
                  <td><?php echo $hasil ["password"]; ?></td>
                  <td>
                    <button type="button" class="btn btn-info my-1 mx-2"
                    data-toggle="modal" data-target="#modal"
                    onclick="Edit(this.parentElement.parentElement.rowIndex);">
                      Edit
                    </button>
                    <a href="database_pelanggan.php?hapus=pelanggan&id_pl=<?php echo $hasil["id_pl"]?>"
                      onclick="return confirm('Are you sure? This data will deleted.')">
                      <button type="button" class="btn btn-danger">
                        Hapus
                      </button>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php endif; ?>
      </div>
      <div class="card-footer">
        <button type="button" class="btn btn-success"
        data-toggle="modal" data-target="#modal" onclick="Add()">
          Tambah
        </button>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="database_pelanggan.php" method="post" enctype="multipart/form-data">
          <div class="modal-header">
            <h4>Masukkan Data</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="action" id="action">
            ID
            <input type="text" name="id_pl" id="id_pl" class="form-control">
            Nama
            <input type="text" name="nama_pl" id="nama_pl" class="form-control">
            Alamat
            <input type="text" name="alamat_pl" id="alamat_pl" class="form-control">
            Kontak
            <input type="text" name="kontak" id="kontak" class="form-control">
            Username
            <input type="text" name="username" id="username" class="form-control">
            Password
            <input type="password" name="password" id="password" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">
              Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  </body>
</html>
