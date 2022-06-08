<?php
include('../../config/koneksi.php');
include('style/header.php');
include('style/sidebar.php');

?>
<div class="container-fluid">
	<!-- Basic Card Example -->
	<div class="card shadow mt-3 mb-3">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-info">Data Penilaian</h6>
		</div>
		<div class="card-body">
			<button class="btn btn-sm btn-info mb-3" data-toggle="modal" data-target="#tambah_pelanggan"><i class="fas fa-plus fa-sm"></i> Tambah Penilaian</button>
			<div class="table-responsive">
				<table class="table table-bordered" width="100%">
					<thead>
						<tr align="center">
							<th>No</th>
							<th>Nama Alternatif</th>
							<?php
							$sqlth = $konek->query("SELECT * FROM kriteria");
							while ($rowth = $sqlth->fetch_array()) {
							?>
								<th><?= $rowth['nama_kriteria']; ?></th>
							<?php
							}
							?>
							<th colspan="2">Aksi</th>
						</tr>
					</thead>
					<?php
					include('../../config/koneksi.php');
					$no = 1;
					$query = mysqli_query($konek, "SELECT DISTINCT * FROM penilaian a JOIN alternatif b ON a.id_alternatif = b.id_alternatif WHERE a.id_periode = '$idp' GROUP BY a.id_alternatif");
					while ($data = mysqli_fetch_assoc($query)) {
						$idalt = $data['id_alternatif'];
						$nmalt = $data['nama_alternatif'];
						$idsub = $data['id_subkriteria'];
					?>
						<tbody>
							<tr>
								<td><?= $no; ?></td>
								<td><?= $nmalt; ?></td>
								<?php
								$query2 = $konek->query("SELECT * FROM penilaian a JOIN subkriteria b ON a.id_subkriteria = b.id_subkriteria WHERE a.id_alternatif = '$idalt' AND a.id_periode = '$idp'");
								while ($rowq2 = $query2->fetch_array()) {
								?>
									<td align="center"><?= $rowq2['bobot']; ?></td>
								<?php
								}
								?>
								<td>
									<a href="edit_penilaian.php?id=<?php echo $data['id_alternatif']; ?>&idp=<?php echo $idp; ?>"><i class="btn btn-success btn-sm"><span class="fas fa-edit"></span></i></a>
								</td>

								<td>
									<a href="hapus_penilaian.php?id=<?php echo $data['id_alternatif']; ?>&idp=<?php echo $idp; ?>"><i class="btn btn-danger btn-sm"><span class="fas fa-trash"></span></i></a>
								</td>
							</tr>
						</tbody>
					<?php
						$no++;
					}
					?>
				</table>
			</div>
			<div align="right">
				<a href="proses.php?&idp=<?php echo $idp; ?>" class="btn btn-info">Next</a>
			</div>
		</div>
	</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_pelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Form Entry Data Penilaian</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<!-- ID -->
						<label>Alternatif</label>
						<select name="id_a" class="form-control mb-2">
							<option value="">Pilih Alternatif</option>
							<?php
							$mysqli = mysqli_query($konek, "SELECT * FROM alternatif WHERE id_alternatif AND id_periode = '$idp'");
							while ($fetch = mysqli_fetch_assoc($mysqli)) {
							?>
								<option value="<?php echo $fetch['id_alternatif']; ?>"><?php echo $fetch['nama_alternatif']; ?></option>
							<?php
							}
							?>
						</select>
						<!-- Loop -->
						<?php
						$c = 1;
						$x = 1;
						$sqlnilai = $konek->query("SELECT * FROM kriteria");
						while ($rownilai = $sqlnilai->fetch_array()) {
						?>
							<label><?php echo $rownilai['nama_kriteria']; ?> (C<?= $c++; ?>)</label>
							<select name="k<?= $x; ?>" class="form-control mb-2">
								<option value="#">---Pilih Nilai--- </option>
								<?php
								$sqlsubs = $konek->query("SELECT * FROM subkriteria WHERE id_kriteria = '$rownilai[id_kriteria]'");
								while ($rowsubs = $sqlsubs->fetch_array()) {
								?>
									<option value="<?= $rowsubs['id_subkriteria']; ?>"><?= $rowsubs['keterangan']; ?></option>
								<?php
								}
								?>
							</select>
						<?php
							$x++;
						}
						?>

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
include("../../config/koneksi.php");
if (isset($_POST['tambah'])) {
	$idp = $_GET['idp'];
	$id_a = $_POST['id_a'];
	$sqlcek = mysqli_query($konek,"SELECT * FROM penilaian WHERE id_alternatif = '$id_a' AND id_periode = '$idp'");
	$cekquery = mysqli_num_rows($sqlcek);
	if ($cekquery > 0) {
		echo "<script language=javascript>
          window.alert('Data Sudah Ada!');
          window.location='data_penilaian.php?idp=$idp';
          </script>";
	}else{
		$query2 = mysqli_query($konek, "SELECT * FROM kriteria");
		$rq2 = $query2->num_rows;
		for ($i = 1; $i <= $rq2; $i++) {
			$n = $_POST["k$i"];
			$save = mysqli_query($konek, "INSERT INTO penilaian (id_alternatif, id_periode, id_subkriteria) VALUES('$id_a','$idp','$n')");
		}
		if ($save) {
			echo "<script language=javascript>
			  window.alert('Berhasil Menambah!');
			  window.location='data_penilaian.php?idp=$idp';
			  </script>";
		} else {
			echo "<script language=javascript>
			  window.alert('Gagal Menambah!');
			  window.location='data_penilaian.php?idp=$idp';
			  </script>";
		}
	}

	}
?>

<?php
include('style/footer.php');
?>