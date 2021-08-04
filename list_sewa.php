<div class="card col-sm-12">
  <div class="card-header">
    <h4>Daftar Beli</h4>
  </div>
  <div class="card-body">
    <form action="database_sewa.php?checkout=true" method="post"
    onsubmit="return confirm('Apakah anda yakin dengan pesanan ini?')">
    <table class="table">
      <thead>
        <tr>
			<th>ID</th>
			<th>Nama</th>
            <th>Merk</th>
            <th>Jenis</th>
			<th>Warna</th>
			<th>Tahun Pembuatan</th>
            <th>Biaya Per Hari</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($_SESSION["session_sewa"] as  $hasil): ?>
          <tr>
            <td><?php echo $hasil["id_mb"]; ?></td>
            <td><?php echo $hasil["nm_mb"]; ?></td>
            <td><?php echo $hasil["merk"]; ?></td>
            <td><?php echo $hasil["jenis"]; ?></td>
			<td><?php echo $hasil["warna"]; ?></td>
			<td><?php echo $hasil["thn_pb"]; ?></td>
			<td>Rp. <?php echo number_format($hasil["biaya_per_hari"]); ?></td>
            <td>
              <img src="img_mobil/<?php echo $hasil["picture"]; ?>" width="100" height="auto" class="img" alt="">
            </td>
            <td>
              <a href="database_sewa.php?hapus=true&id_mb=<?php echo $hasil["id_mb"]; ?>">
                <button type="button" class="btn btn-danger">
                  Hapus
                </button>
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
	<h5>Tanggal Mulai Menyewa :</h5>
	<input type='date' name='tgl_sewa' class="form-control mb-2" value='<?php echo "$tgl_sewa";?>'/> 
	<h5>Tanggal Mengembalikan :</h5>
	<input type='date' name='tgl_kembali' class="form-control mb-2" value='<?php echo "$tgl_kembali";?>'/> 
	
    <button type="submit" class="btn btn-block btn-success ms-2">
      Checkout
    </button>
	
	<button type="button" class="btn btn-block btn-secondary ms-2" onclick="location.href='template_pelanggan.php?page=list_mobil'">
	Kembali</button>
    </form>
  </div>
</div>
