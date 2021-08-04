<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | KARYAWAN </title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
	<script type="text/javascript">
      function Add() {
        document.getElementById('action').value = "insert";

        document.getElementById("id_kr").value = "";
        document.getElementById("nama_kr").value = "";
		    document.getElementById("alamat_kr").value = "";	
        document.getElementById("username").value = "";
        document.getElementById("password").value = "";
        document.getElementById("kontak").value = "";
      }
	  </script>
  </head>
  <body>
    <div class="container my-5">
      <div class="row justify-content-center align-items-center">
      <div class="col-sm-6 card">
        <div class="card-header bg-white">
          <h3>Silahkan Login</h3>
        </div>
        <div class="card-body">
			<?php if (isset($_SESSION["message"])): ?>
            <div class="alert alert-danger <?=($_SESSION["message"]["type"])?>">
              <?php echo $_SESSION["message"]["message"]; ?>
              <?php unset ($_SESSION["message"]); ?>
            </div>
          <?php endif; ?>
          <form action="proses_login.php" method="post">
            <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
            <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
            <button type="submit" name="button" class="btn btn-success btn-block ms-2">Login</button>
			<button type="button" class="btn btn-secondary btn-block ms-2" onclick="location.href='masuk.php';">Kembali</button>
          </form>
        </div>
        <div class="card-footer bg-white d-flex bd-highlight mb-3 py-1">
         
          <button type="button" class="btn bd-highlight mx-2"
          data-toggle="modal" data-target="#modal" onclick="Add()">
            Register Here!
          </button>
		  <h6> 	If you don't have an account </H6>
        </div>
		
		</div>
      </div>
    </div><div class="modal fade" id="modal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form action="database_karyawan.php" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <h4>Masukkan Data</h4>
            </div>
            <div class="modal-body">
              <input type="hidden" name="action" id="action">
              ID
              <input type="text" name="id_kr" id="id_kr" class="form-control">
              Nama
              <input type="text" name="nama_kr" id="nama_kr" class="form-control">
			  Alamat
              <input type="text" name="alamat_kr" id="alamat_kr" class="form-control">
              Kontak
              <input type="text" name="kontak" id="kontak" class="form-control">
              Username
              <input type="text" name="username" id="username" class="form-control">
              Password
              <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">
                Register
              </button>
			  
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
