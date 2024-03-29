<?php session_start(); ?>
<?php if(isset($_SESSION["session_karyawan"])): ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penyewaan</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark sticky-top">
      <a href="#" class="text-white">
         <h3>KARYAWAN PENYEWAAN</h3>
      </a>

      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu">
        <span class="navbar navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse mx-5" id="menu">
        <ul class="navbar-nav">
          <li class="nav-item"><a href="template.php?page=mobil" class="nav-link">LIST MOBIL</a></li>
          <li class="nav-item"><a href="template.php?page=pelanggan" class="nav-link">PELANGGAN</a></li>
          <li class="nav-item"><a href="template.php?page=karyawan" class="nav-link">KARYAWAN</a></li>
		      <li class="nav-item"><a href="template.php?page=daftar_sewa" class="nav-link">DATA PENYEWAAN</a></li>
          <li class="nav-item"><a href="proses_login.php?logout=true" class="nav-link">LOGOUT</a></li>
        </ul>
      </div>
      <h5 class="text-white">Hello, <?php echo $_SESSION["session_karyawan"]["nama_kr"];?></h5>
    </nav>
    <div class="container my-2">
      <?php if (isset($_GET["page"])):?>
        <?php if ((@include $_GET["page"].".php") === true): ?>
          <?php include $_GET["page"].".php"; ?>
        <?php endif ?>
      <?php endif ?>
    </div>
  </body>
</html>
<?php else: ?>
  <?php echo "Anda belum login!"; ?>
  <br>
  <a href="login.php">
    Login Here
  </a>
<?php endif; ?>
