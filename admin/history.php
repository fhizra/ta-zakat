<?php 
	include ("style/header.php");
	include ("style/sidebarawal.php");
?>
<div class="container-fluid">
	<div class="col-lg-12">
		<!-- Basic Card Example -->
		<div class="card shadow mt-3 mb-3">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-info">Rekap Pengambilan Keputusan</h6>
			</div>
			<div class="card-body">
				<button class="btn btn-sm btn-info mb-3" data-toggle="modal" data-target="#tambah_mobil"><i class="fas fa-plus fa-sm"></i> Tambah Data</button>
      			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr align="center">
							<th>No</th>
							<th>Tanggal</th>
							<th>Keterangan</th>
							<th colspan="3">Aksi</th>
						</tr>
					</thead>
					<?php 
						include("../config/koneksi.php");
						$no=1;
						$sql = mysqli_query($konek, "SELECT * FROM periode ORDER BY id_periode ASC");
						while($array = mysqli_fetch_assoc($sql)){
					?>
					<tbody>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $array['tanggal']; ?></td>
							<td><?php echo $array['keterangan']; ?></td>
							<td><a href="proses/index.php?idp=<?php echo $array['id_periode'];?>"><i class="btn btn-success btn-sm"><span class="fas fa-plus-square"></span></i></a></td>
							<td><a href="proses/hasil_keputusan	.php?idp=<?php echo $array['id_periode'];?>"><i class="btn btn-success btn-sm"><span class="fas fa-search"></span></i></a></td>
							<td><a href="hapus_history.php?idp=<?php echo $array['id_periode']; ?>"><i class="btn btn-danger btn-sm"><span class="fas fa-trash"></span></i></a></td>
						</tr>
					</tbody>
					<?php 
					} 
					?>
				</table>
      			</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_mobil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Entry Data Periode</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="" method="POST" enctype="multipart/form-data">
      		<div class="form-group">
            <label>Tanggal</label>
            	<input type="date" class="form-control mb-2" name="tanggal" placeholder="Tanggal..." required="">
            <label>Keterangan</label>
      			<input type="text" class="form-control mb-2" name="keterangan" placeholder="Keterangan..." required="">
      		</div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="tambah" class="btn btn-primary btn-sm">Tambah</button>
      </div>
      	</form>
    </div>
  </div>
</div>


<?php 
	include ("../config/koneksi.php");
	if (isset($_POST['tambah'])) {
      $tanggal 		= $_POST['tanggal'];
      $keterangan 	= $_POST['keterangan'];
	
	$save = mysqli_query($konek,"INSERT INTO periode VALUES('','$tanggal','$keterangan')");
	if($save) {
      echo "<script language=javascript>
          window.alert('Data Berhasil di Tambahkan!');
          window.location='history.php';
          </script>";
      }else{
        echo "<script language=javascript>
          window.alert('Data Gagal di Tambahkan!');
          window.location='history.php';
          </script>";
      }
}
?>

<?php 
	include ("style/footer.php");
?>