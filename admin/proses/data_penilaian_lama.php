<?php 
	include ('../../config/koneksi.php');
    include ('style/header.php');
    include ('style/sidebar.php');
    //kriteria1
    $sqlc1 = mysqli_query($konek,"SELECT nama_kriteria FROM kriteria WHERE id_kriteria = '1'");
    $data1 = mysqli_fetch_array($sqlc1);
    $k1 = $data1[0];
    //kriteria2
    $sqlc2 = mysqli_query($konek,"SELECT nama_kriteria FROM kriteria WHERE id_kriteria = '2'");
    $data2 = mysqli_fetch_array($sqlc2);
    $k2 = $data2[0];
    //kriteria3
    $sqlc3 = mysqli_query($konek,"SELECT nama_kriteria FROM kriteria WHERE id_kriteria = '3'");
    $data3 = mysqli_fetch_array($sqlc3);
    $k3 = $data3[0];
    //kriteria4
    $sqlc4 = mysqli_query($konek,"SELECT nama_kriteria FROM kriteria WHERE id_kriteria = '4'");
    $data4 = mysqli_fetch_array($sqlc4);
    $k4 = $data4[0];
    //kriteria5
    $sqlc5 = mysqli_query($konek,"SELECT nama_kriteria FROM kriteria WHERE id_kriteria = '5'");
    $data5 = mysqli_fetch_array($sqlc5);
    $k5 = $data5[0];
?>
<div class="container-fluid">
	<!-- Basic Card Example -->
	<div class="card shadow mt-3 mb-3">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-success">Data Penilaian</h6>
		</div>
		<div class="card-body">
			<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_pelanggan"><i class="fas fa-plus fa-sm"></i> Tambah Penilaian</button>
			<div class="table-responsive">
			<table class="table table-bordered" width="100%">
				<thead>
					<tr align="center">
						<th>No</th>
						<th>Nama Alternatif</th>
						<th><?php echo $k1; ?></th>
						<th><?php echo $k2; ?></th>
						<th><?php echo $k3; ?></th>
						<th><?php echo $k4; ?></th>
						<th><?php echo $k5; ?></th>
						<th colspan="4">Aksi</th>
					</tr>
				</thead>
				<?php 
				include ('../../config/koneksi.php');
				$no = 1;
				$query = mysqli_query($konek,"SELECT * FROM penilaian a LEFT JOIN alternatif b ON a.id_alternatif = b.id_alternatif WHERE a.id_periode = '$idp'");
				while($data = mysqli_fetch_assoc($query)){
				?>
				<tbody>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $data['nama_alternatif']; ?></td>
						<td><?php echo $data['c1']; ?></td>
						<td><?php echo $data['c2']; ?></td>
						<td><?php echo $data['c3']; ?></td>
						<td><?php echo $data['c4']; ?></td>
						<td><?php echo $data['c5']; ?></td>
						
						<td>
							<a href="edit_penilaian.php?id=<?php echo $data['id_alternatif']; ?>&idp=<?php echo $idp; ?>"><i class="btn btn-success btn-sm"><span class="fas fa-edit"></span></i></a>
						</td>

						<td>
							<a href="hapus_penilaian.php?id=<?php echo $data['id_alternatif']; ?>&idp=<?php echo $idp; ?>"><i class="btn btn-danger btn-sm"><span class="fas fa-trash"></span></i></a>
						</td>
					</tr>
				</tbody>
				<?php 
				}
				?>
			</table>
			</div>
			<div align="right">
	<a href="data_kriteria.php?&idp=<?php echo $idp; ?>" class="btn btn-danger">Back</a>
	<a href="proses.php?&idp=<?php echo $idp; ?>" class="btn btn-primary">Next</a>
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
      			<select name="ids" class="form-control mb-2">
      				<option value="">Pilih Alternatif</option>
      					<?php 
      					$mysqli = mysqli_query($konek, "SELECT * FROM alternatif where id_periode = '$idp'");
      					while($fetch = mysqli_fetch_assoc($mysqli)){
      					?>
      				<option value="<?php echo $fetch['id_alternatif']; ?>"><?php echo $fetch['nama_alternatif']; ?></option>
      					<?php 
      						}
      					?>
      			</select>
      			<!-- C1 -->
      			<label><?php echo $k1; ?> (C1)</label>
      			<select name="c1" class="form-control mb-2">
      				<option value="">Pilih Nilai</option>
      				<option value="1">Sangat Baik</option>
      				<option value="0.75">Baik</option>
							<option value="0.5">Tidak Baik</option>
							<option value="0.25">Sangat Tidak Baik</option>
      			</select>
      			<!-- C2 -->
      			<label><?php echo $k2; ?> (C2)</label>
      			<select name="c2" class="form-control mb-2">
      				<option value="">Pilih Nilai</option>
      				<option value="1">Mengikuti semua kegiatan pelatihan</option>
      				<option value="0.75">Tidak mengikuti lebih dari 5 kali</option>
              <option value="0.5">Tidak Mengikuti lebih dari 10 kali</option>
              <option value="0.25">Tidak Berpatisipasi</option>
      			</select>
      			<!-- C3 -->
      			<label><?php echo $k3; ?> (C3)</label>
      			<select name="c3" class="form-control mb-2">
      				<option value="">Pilih Nilai</option>
      				<option value="1">Melakukan satu tindak pidana umum</option>
      				<option value="0.75">Melakukan lebih dari satu tindak pidana umum</option>
              <option value="0.5">Melakukan satu atau lebih tinda pidana khusus</option>
              <option value="0.25">Melakukan tindak pidana umum dan khusus</option>
      			</select>
      			<!-- C4 -->
      			<label><?php echo $k4; ?> (C4)</label>
      			<select name="c4" class="form-control mb-2">
      				<option value="">Pilih Nilai</option>
      				<option value="1">Menghasilkan Karya</option>
      				<option value="0.75">Melakukan Donor darah atau donor organ tubuh</option>
              <option value="0.5">Membantu Petugas</option>
              <option value="0.25">Tidak Berpastisipasi dalam kegiatan</option>
      			</select>
      			<!-- C5 -->
      			<label><?php echo $k5; ?> (C5)</label>
      			<select name="c5" class="form-control mb-2">
      				<option value="">Pilih Nilai</option>
      				<option value="1">Mengikuti semua kegiatan Pelatihan</option>
      				<option value="0.75">Tidak Mengukuti lebih dari 5 Kali</option>
              <option value="0.5">Tidak Mengukuti lebih dari 10 kali</option>
              <option value="0.25">Tidak Berpatisipasi</option>
      			</select>
      		
      			
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
	
	include ("../../config/koneksi.php");
	if (isset($_POST['tambah'])) {
		
    $idp = $_GET['idp'];
	$query2 = mysqli_query($konek,"SELECT * FROM penilaian where id_alternatif = '$_POST[id_a]'");
    $data2 = mysqli_fetch_assoc($query2);
    $jml = mysqli_num_rows($query2);
    if($jml==0){
    $ids 			= $_POST['ids'];
	$c1 				= $_POST['c1'];
	$c2 				= $_POST['c2'];
	$c3 				= $_POST['c3'];
	$c4 				= $_POST['c4'];
	$c5 				= $_POST['c5'];
	
	
	$save = mysqli_query($konek,"INSERT INTO penilaian (id_penilaian, id_alternatif, id_periode, c1,c2,c3,c4,c5) VALUES('','$ids','$idp','$c1','$c2','$c3','$c4','$c5')");
	if($save) {
      echo "<script language=javascript>
          window.alert('Berhasil Menambah!');
          window.location='data_penilaian.php?idp=$idp';
          </script>";
      }else{
        echo "<script language=javascript>
          window.alert('Gagal Menambah!');
          window.location='data_penilaian.php?idp=$idp';
          </script>";
      }
      }else{
        echo "<script language=javascript>
          window.alert('Data sudah dilakukan Penilaian!');
          window.location='data_penilaian.php?idp=$idp';
          </script>";
      }
}
?>

<?php 
    include ('style/footer.php');
?>