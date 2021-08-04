<?php
$koneksi = mysqli_connect("localhost","root","","sewa-mobil");
$sql = "select * from mobil";
$result = mysqli_query($koneksi,$sql);
?>
<div class="row">
  <?php foreach ($result as $hasil): ?>
    <div class="card col-sm-4">
      <div class="card-body">
        <img src="img_mobil/<?php echo $hasil["picture"] ?>" class="img" width="100%" height="auto">
      </div>
      <div class="card-footer">
        <h5 class="text-center"><?php echo $hasil["nm_mb"]; ?></h5>
        <h6 class="text-center"><?php echo $hasil["merk"]; ?></h6>
        <h6 class="text-center"><?php echo $hasil["jenis"]; ?></h6>
		<h6 class="text-center"><?php echo $hasil["warna"]; ?></h6>
        <h6 class="text-center">Harga Per Hari : <?php echo "Rp ". number_format($hasil["biaya_per_hari"]); ?></h6>
		<?php if ($hasil['tersewa'] == '0'):?>
		<a href="database_sewa.php?sewa=true&id_mb=<?php echo $hasil["id_mb"]; ?>">
        <button type="button" class="btn btn-info btn-block">
        Sewa
        </button>
		</a>
		<?php elseif ($hasil['tersewa'] == '1'):?>
		<button type="button" class="btn btn-dark btn-block" >
        Sedang Disewa
        </button>
        </a>
  <?php endif; ?>
      </div>
    </div>
  <?php endforeach; ?>
</div>
