<script src="assets/js/bootstrap.js"></script>
<script type="text/javascript">
  function Print() {
    var printDokumen = document.getElementById("report").innerHTML;
    var originalDokumen = document.body.innerHTML;
    document.body.innerHTML = printDokumen;
    window.print();
    document.body.innerHTML = originalDokumen;
  }</script>
<div  id= "report" class="card col-sm-12">
  <div class="card-header">
    <h3>Nota Transaksi</h3>
    </div>
    <div class="card-body">
      <?php
	  $koneksi = mysqli_connect("localhost","root","","sewa-mobil");
	    $id_sw = $_GET['id_sw'];
      $sql = "select sewa.*, pelanggan.nama_pl
      from sewa inner join pelanggan on sewa.id_pl = pelanggan.id_pl
      where sewa.id_sw = '$id_sw'";
      $result = mysqli_query($koneksi,$sql);
      foreach ($result as $hasil);

     
      $sql2 = "select mobil.*, sewa.biaya_sewa
      from mobil inner join sewa
      on mobil.id_mb = sewa.id_mb
      where sewa.id_sw='$id_sw'";
      $result2 = mysqli_query($koneksi,$sql2);
      ?>
	  <h4>Nama : <?php echo $hasil["nama_pl"]; ?></h4>
      <h4>ID. Transaksi : <?php echo $hasil["id_sw"]; ?></h4>
      <h4>Tgl. Transaksi : <?php echo $hasil["tgl_sewa"]; ?></h4>
      <br>
     <div class="modal-footer">
	 
      <h2>TOTAL BIAYA SEWA : </h2>
	  <h2 class="text-right text-success"><?php echo "Rp ". number_format($hasil["biaya_sewa"]); ?></h2>
  </div>
  <button onclick="Print()" type="button" class="btn btn-left btn-success">
	Print
	</button>
</div>
</div>

