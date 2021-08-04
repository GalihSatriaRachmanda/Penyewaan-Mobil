<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | PENYEWAAN MOBIL</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </head>
  <body>
    <div class="container my-3">
      <div class="row justify-content-center align-items-center">
      <div class="col-sm-6 card">
        <div class="card-header bg-white">
          <h3>PILIH CARA LOGIN</h3>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary btn-block" onclick="location.href='login.php';">Login Sebagai Karyawan</button>
			<br>
			<button type="button" class="btn btn-primary btn-block" onclick="location.href='login_pelanggan.php';">Login Sebagai Pelanggan</button>
          </form>
        </div>
		<div class="card-footer bg-white d-flex bd-highlight mb-3 py-1">
		<h5 class="text-right text-secondary" >By : Penyewaan mobil™</h5>
	</div>
      </div>
      </div>
    </div>
  </body>
</html>
