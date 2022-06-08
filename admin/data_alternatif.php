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
				<h6 class="m-0 font-weight-bold text-info">Data Alternatif</h6>
			</div>
			<div class="card-body">
				<button class="btn btn-sm btn-info mb-3" data-toggle="modal" data-target="#tambah_mobil"><i class="fas fa-plus fa-sm"></i> Tambah Data</button>
        		<a target="_blank" href="cetak_alternatif.php" class="btn btn-sm btn-success mb-3"><i class="fas fa-print"></i> Cetak</a>
      		<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr align="center">
							<th>No</th>
							<!-- <th>ID Alternatif</th> -->
							<th>Nama Alternatif</th>  
							<th colspan="2">Aksi</th>
						</tr>
					</thead>
					<?php 
						include("../config/koneksi.php");
						$no=1;
						$sql = mysqli_query($konek, "SELECT * FROM alternatif");
						while($array = mysqli_fetch_assoc($sql)){
					?>
					<tbody>
						<tr align="center">
							<td><?php echo $no++; ?></td>
							<td align="left"><?php echo $array['nama_alternatif']; ?></td>
							<td>
								<a href="edit_alternatif.php?id=<?php echo $array['id_alternatif']; ?>"><i class="btn btn-success btn-sm"><span class="fas fa-edit"></span></i></a>
							</td>
							<td>
								<a href="hapus_alternatif.php?id=<?php echo $array['id_alternatif']; ?>"><i class="btn btn-danger btn-sm"><span class="fas fa-trash"></span></i></a>
							</td>
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
        <h5 class="modal-title" id="exampleModalLabel">Form Entry Data Alternatif</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="" method="POST" enctype="multipart/form-data">
      		<div class="form-group">
            <label>Nama Alternatif</label>
      			<input type="text" class="form-control mb-2" name="nama_alternatif" placeholder="Nama Alternatif" required=""> 
      		<label for="sub kriteria">Periode</label>
                <select name="id_periode" id="" class="form-control">
                    <option>--Pilih periode</option>
                <?php 
                    include("../config/koneksi.php");
                      $sqlkriteria = mysqli_query($konek,"SELECT * FROM periode");
                      while ($row = mysqli_fetch_array($sqlkriteria)) {
                        ?>
                        <option value="<?php echo $row['id_periode'] ?>"><?php echo $row['keterangan']; ?></option>
                        <?php
                      }
                       ?>
                    </select>
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
    
    $idk = $_POST['id_periode'];  
    $nama_alternatif = $_POST['nama_alternatif'];
      
	$save = mysqli_query($konek,"INSERT INTO alternatif VALUES ('','$nama_alternatif')");

	if($save) {
      echo "<script language=javascript>
          window.alert('Berhasil Menambah!');
          window.location='data_alternatif.php';
          </script>";
      }else{
        echo "<script language=javascript>
          window.alert('Gagal Menambah!');
          window.location='data_alternatif.php';
          </script>";
      }
}
?>

<?php 
	include ("style/footer.php");
?>