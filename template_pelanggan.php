<?php session_start(); ?>
<?php if(isset($_SESSION["session_pelanggan"])): ?>

<!DOCTYPE html>
<html lang="en" dir-"ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PENYEWAAN MOBIL</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top d-flex bd-highlight mb-3 py-3">
      <a href="template_pelanggan.php?page=list_mobil" class="text-white">
        <h3>PENYEWAAN MOBIL</h3>
      </a>

      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu">
        <span class="navbar navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav">
          <li class="nav-item"><a href="proses_login_pelanggan.php?logout=true" class="nav-link">LOGOUT</a></li>
        </ul>
      </div>
      <h5>
        <a class="fa fa-pelanggan text-white mx-1"></a>
      </h5>
      <h6 class="text-white mx-2">Hello, <?php echo $_SESSION["session_pelanggan"]["nama_pl"];?></h6>
      <h5>
        <a class="fa fa-shopping-cart text-white mx-1"></a>
      </h5>
        <a href="template_pelanggan.php?page=list_sewa">

          <b class="text-white">Sewa : <?php echo count ($_SESSION["session_sewa"]); ?></b>
        </a>
      </nav>
    <div class="container my-2">
      <?php if (isset($_GET["page"])): ?>
        <?php if ((@include $_GET["page"].".php") === true): ?>
          <?php include $_GET["page"].".php"; ?>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </body>
</html>
<?php else: ?>
  <?php echo "Anda belum login!"; ?>
  <br>
  <a href="login_pelanggan.php">
    Login Here
  </a>
<?php endif; ?>
