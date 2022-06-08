<?php 
	include ("style/header.php");
	include ("style/sidebarawal.php");
	  // $idp = $_GET['idp'];
?>
<div class="container-fluid">
	<div class="col-lg-12">
		<!-- Basic Card Example -->
		<div class="card shadow mt-3 mb-3">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-info">Data Kriteria</h6>
			</div>
			<div class="card-body">
				<button class="btn btn-sm btn-info mb-3" data-toggle="modal" data-target="#tambah_bank"><i class="fas fa-plus fa-sm"></i> Tambah Kriteria</button>
        <div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr align="center">
							<th>No</th>
							<th>Nama Kriteria</th>
							<th>Bobot Preferensi</th>
							<th>Sifat</th>
							<th colspan="2">Aksi</th>
						</tr>
					</thead>
					<?php 
						include("../config/koneksi.php");
						$no=1;
						$sql = mysqli_query($konek, "SELECT * FROM kriteria");
						while($array = mysqli_fetch_assoc($sql)){
					?>
					<tbody>
						<tr align="center">
							<td><?php echo $no++; ?></td>
							<td align="left"><?php echo $array['nama_kriteria']; ?></td>
							<td><?php echo $array['bobot_pref']; ?></td>
							<td><?php echo $array['sifat']; ?></td>
							<td>
								<a href="edit_kriteria.php?id=<?php echo $array['id_kriteria']; ?>"><i class="btn btn-success btn-sm"><span class="fas fa-edit"></span></i></a></td>
							<td>
								<a href="hapus_kriteria.php?id=<?php echo $array['id_kriteria']; ?>"><i class="btn btn-danger btn-sm"><span class="fas fa-trash"></span></i></a></td>
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
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_bank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Entry Data Kriteria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="" method="POST" enctype="multipart/form-data">
      		<div class="form-group">
      			<!-- <input type="hidden" class="form-control mb-2" name="id" value="<?php echo $_SESSION['id']; ?>"> -->
            <label>Nama Kriteria</label>
      			<input type="text" class="form-control mb-2" name="nama_kriteria" placeholder="Nama Kriteria" required="">
            <label>Bobot Preferensi</label>
      			<input type="text" name="bobot_pref" class="form-control mb-2" placeholder="bobot_pref">
            <label>sifat</label>
            <select name="sifat" class="form-control mb-2" required="">
              <option>--</option>
              <option value="Benefit">Benefit</option>
              <option value="Cost">Cost</option>
            </select>
      		</div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="tambah" class="btn btn-info btn-sm">Tambah</button>
      </div>
      	</form>
    </div>
  </div>
</div>


<?php 
	include ("../config/koneksi.php");
	if (isset($_POST['tambah'])) {
    $nama_kriteria = $_POST['nama_kriteria'];
    $sifat 		     = $_POST['sifat'];
    $bobot_pref    = $_POST['bobot_pref'];
	
	$save = mysqli_query($konek,"INSERT INTO kriteria VALUES('$idk','$nama_kriteria','$sifat','$bobot_pref')");

	if($save) {
      echo "<script language=javascript>
          window.alert('Berhasil Menambah!');
          window.location='data_kriteria.php';
          </script>";
      }else{
        echo "<script language=javascript>
          window.alert('Gagal Menambah!');
          window.location='data_kriteria.php';
          </script>";
      }
}
?>

<?php 
	include ("style/footer.php");
?>