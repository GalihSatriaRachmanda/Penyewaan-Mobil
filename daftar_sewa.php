
    <script src="assets/js/bootstrap.js"></script><script type="text/javascript">
  function Print() {
    var printDokumen = document.getElementById("report").innerHTML;
    var originalDokumen = document.body.innerHTML;
    document.body.innerHTML = printDokumen;
    window.print();
    document.body.innerHTML = originalDokumen;
  }
</script>
<div id= "report" class="card col-sm-12">
<div class="card-header">
<h3>Daftar Sewa</h3>
</div>
<div class="card-body">
<?php
$koneksi=mysqli_connect("localhost","root","","sewa-mobil");
$sql="select sewa.*,pelanggan.id_pl
from sewa inner join pelanggan
on sewa.id_pl=pelanggan.id_pl";
$result=mysqli_query($koneksi,$sql);
?>
<table class="table">
  <thead>
    <tr>
      <th>Tanggal Penyewaan</th>
      <th>Kode Penyewaan</th>
      <th>ID Pelanggan</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($result as $hasil): ?>
      <tr>
        <td><?php echo $hasil["tgl_sewa"]; ?></td>
        <td><?php echo $hasil["id_sw"]; ?></td>
        <td><?php echo $hasil["id_pl"]; ?></td>
        <td>
          <a href="template.php?page=nota&id_sw=<?php echo $hasil["id_sw"]; ?>">
            <button type="button" class="btn btn-info">
              Detail
            </button>
          </a>
        </td>
      </tr>
    <?php  endforeach;?>
  </tbody>
</table>

<button onclick="Print()" type="button" class="btn btn-success">
  Print
</button>
</div>
</div>
