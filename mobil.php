<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script type="text/javascript">
      function Add() {
        document.getElementById('action').value = "insert";

        document.getElementById("id_mb").value = "";
        document.getElementById("nm_mb").value = "";
        document.getElementById("merk").value = "";
        document.getElementById("jenis").value = "";
		document.getElementById("warna").value = "";
		document.getElementById("thn_pb").value = "";
        document.getElementById("biaya_per_hari").value = "";

      }
      function Edit(index) {
        document.getElementById('action').value = "update";

        var table = document.getElementById("table_mobil");

        var id_mb = table.rows[index].cells[0].innerHTML;
        var nm_mb = table.rows[index].cells[1].innerHTML;
        var merk = table.rows[index].cells[2].innerHTML;
        var jenis = table.rows[index].cells[3].innerHTML;
        var warna = table.rows[index].cells[4].innerHTML;
        var thn_pb = table.rows[index].cells[5].innerHTML;
        var biaya_per_hari = table.rows[index].cells[6].innerHTML;


        document.getElementById("id_mb").value = id_mb;
        document.getElementById("nm_mb").value = nm_mb;
        document.getElementById("merk").value = merk;
        document.getElementById("jenis").value = jenis;
        document.getElementById("warna").value = warna;
        document.getElementById("thn_pb").value = thn_pb;
        document.getElementById("biaya_per_hari").value = biaya_per_hari;

      }
    </script>
  </head>
  <body>
    <div class="card col-sm-12 my-2 mx-2">
      <div class="card-header">
        <h4>List Mobil</h4>
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
        $sql = "select * from mobil";
        $result = mysqli_query($koneksi,$sql);
        $count = mysqli_num_rows($result);
        ?>

        <?php if ($count == 0): ?>
          <div class="alert alert-danger">
            Data Belum tersedia!
          </div>
        <?php else: ?>
          <table class="table" id="table_mobil">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Merk</th>
                <th>Jenis</th>
				<th>Warna</th>
				<th>Tahun Pembuatan</th>
                <th>Biaya Sewa Per Hari</th>
                <th></th>
                <th>Option</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($result as $hasil): ?>
                <tr>
                  <td><?php echo $hasil["id_mb"]; ?></td>
                  <td><?php echo $hasil["nm_mb"]; ?></td>
                  <td><?php echo $hasil["merk"]; ?></td>
                  <td><?php echo $hasil["jenis"]; ?></td>
				  <td><?php echo $hasil["warna"]; ?></td>
				  <td><?php echo $hasil["thn_pb"]; ?></td>
                  <td><?php echo "Rp ". number_format($hasil["biaya_per_hari"]); ?></td>
                  <td>
                    <img src="<?php echo "img_mobil/".$hasil["picture"]; ?>"
                    class="img" width="100" alt="mobil">
                  </td>
                  <td>
                    <button type="button" class="btn btn-info my-1 mx-2"
                    data-toggle="modal" data-target="#modal"
                    onclick="Edit(this.parentElement.parentElement.rowIndex);">
                      Edit
                    </button>
                    <a href="database_mobil.php?hapus=mobil&id_mb=<?php echo $hasil["id_mb"] ?>"
                      onclick= "return confirm('Are you sure? This data will deleted.')">
                      <button type="button" class="btn btn-danger ">
                        Hapus
                      </button>
                    </a>
					<?php if ($hasil['tersewa'] == '1'):?>
					<a href="database_sewa.php?tsr=true&id_mb=<?php echo $hasil["id_mb"]; ?>">
					<button type="submit" id="tsr" class="btn btn-dark my-1 mx-2"  onclick= "return confirm('Konfirmasi bahwa mobil telah dikembalikan ?')">
					  konfirmasi
					</button>
					</a>
					<?php endif; ?>
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
        <form action="database_mobil.php" method="post" enctype="multipart/form-data">
          <div class="modal-header">
            <h4>Add APP Description</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="action" id="action">
            
            ID Mobil
            <input type="text" name="id_mb" id="id_mb" class="form-control">
            Nama Mobil
            <input type="text" name="nm_mb" id="nm_mb" class="form-control">
            Merk
            <input type="text" name="merk" id="merk" class="form-control">
			Jenis
            <input type="text" name="jenis" id="jenis" class="form-control">
			Warna
            <input type="text" name="warna" id="warna" class="form-control">
			Tahun Pembuatan
            <input type="text" name="thn_pb" id="thn_pb" class="form-control">
			Biaya Sewa Per Hari
            <input type="text" name="biaya_per_hari" id="biaya_per_hari" class="form-control">
            Picture
            <input type="file" name="picture" id="picture" class="form-control">
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
