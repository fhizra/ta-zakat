<?php 
	include ("style/header.php");
	include ("style/sidebar.php");
	$idp = $_GET['idp'];
?>
<div class="container-fluid">
		<!-- Basic Card Example -->
		<div class="card shadow mt-3 mb-3">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-info">Data Alternatif</h6>
			</div><br>
     	 		<div class="table-responsive">
				<table class="table table-bordered mt-3">
					<thead>
						<tr align="center">
							<th>No</th>
							<th>Nama Alternatif</th>
							<th colspan="2">Aksi</th>
						</tr>
					</thead>
					<?php 
						include("../../config/koneksi.php");
						$no=1;
						$sql = mysqli_query($konek, "SELECT * FROM alternatif WHERE id_periode='$idp'");
						while($array = mysqli_fetch_assoc($sql)){
					?>
					<tbody>
						<tr>
							<td align="center"><?php echo $no++; ?></td>
							<td><?php echo $array['nama_alternatif']; ?></td>
							<td align="center">
								<a href="edit_alternatif.php?id=<?php echo $array['id_alternatif']; ?>&idp=<?php echo $idp; ?>"><i class="btn btn-success btn-sm"><span class="fas fa-edit"></span></i></a>
							</td>
							<td align="center">
								<a href="hapus_alternatif.php?id=<?php echo $array['id_alternatif']; ?>&idp=<?php echo $idp; ?>"><i class="btn btn-danger btn-sm"><span class="fas fa-trash"></span></i></a>
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
      			<select class="form-control" name="id_alternatif" >
      			<option>--nama--</option>
      			<?php  
            	$sql2 = mysqli_query($konek, "SELECT * FROM alternatif");
      				while($data2 = mysqli_fetch_array($sql2)){
			      ?>
      			<option value="<?= $data2['id_alternatif'] ?>"><?= $data2['nama_alternatif']; ?></option>
                <?php } ?>
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
		if (isset($_POST['tambah'])) {
			$id_a  = $_POST['id_alternatif'];
			
			$sqlcekk = $konek->query("SELECT * FROM alternatif WHERE id_alternatif = '$id_a' AND id_periode = '$idp'");
			$rowcekk = $sqlcekk->num_rows;
			if ($rowcekk > 0) {
				echo "<script language=javascript>
				window.alert('Alternatif sudah ada!');
				window.location='data_alternatif.php?idp=$idp'';
				</script>";
			}else{
				$save = mysqli_query($konek,"INSERT INTO alternatif VALUES('','$id_a','$idp')");
	  
		  if($save) {
			echo "<script language=javascript>
				window.alert('Berhasil Menambah!');
				window.location='data_alternatif.php?idp=$idp';
				</script>";
			}else{
			  echo "<script language=javascript>
				window.alert('Gagal Menambah!');
				window.location='data_alternatif.php?idp=$idp';
				</script>";
			}
			}
		  }
?>

<?php 
	include ("style/footer.php");
?>