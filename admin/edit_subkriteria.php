<?php 
	include ("style/header.php");
	include ("style/sidebarawal.php");
	include ("../config/koneksi.php");
	$id_subkriteria = $_GET['id'];
?>
<div class="container-fluid">
	<div class="col-lg-12">
		<!-- Basic Card Example -->
		<div class="card shadow mt-3 mb-3">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Edit Data Sub Kriteria</h6>
			</div>
			<div class="card-body">
				<?php 
					include ("../config/koneksi.php");					
					$qq = mysqli_query($konek, "SELECT id_subkriteria,bobot,keterangan,nama_kriteria,id_kriteria FROM subkriteria INNER JOIN kriteria USING(id_kriteria) WHERE id_subkriteria='$id_subkriteria'");
					$dd = mysqli_fetch_assoc($qq);
				?>
				<form action="" method="POST">
					<input type="hidden" class="form-control" name="idk" value="<?php echo $dd['id_subkriteria']; ?>" readonly="">
					<div class="form-group">
						<label>Nama Kriteria</label>
							<select name="id_kriteria" class="form-control" required>
                    		<option value="<?php echo $dd['id_kriteria']; ?>"><?php echo $dd['nama_kriteria']; ?></option>
               			 <?php 
                    		include("../config/koneksi.php");
                      		$sqlkriteria = mysqli_query($konek,"SELECT * FROM kriteria WHERE nama_kriteria");
                      		while ($row = mysqli_fetch_array($sqlkriteria)) {
                        ?>
                        	
                        <?php
                      }
                       ?>
                    </select>
						
					</div>
					<div class="form-group">
						<label>Bobot</label>
						<input type="text" class="form-control" name="bobot" value="<?php echo $dd['bobot']; ?>">
					</div>
					<div class="form-group">
						<label>Keterangan</label>
						<input type="text" class="form-control" name="keterangan" value="<?php echo $dd['keterangan']; ?>">
					</div>
					<div class="form-group">
						<button type="submit" name="edit" class="btn btn-md btn-success">Edit</button>
						<button type="reset" name="reset" class="btn btn-md btn-danger">Reset</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php 
include ('../config/koneksi.php');
if (isset($_POST['edit'])) {
	
	// $id_kriteria	= $_POST['id_kriteria'];
	$ket	= $_POST['keterangan'];
	$bobot	= $_POST['bobot'];

	$update = mysqli_query($konek,"UPDATE subkriteria SET keterangan = '$ket', bobot = '$bobot' WHERE id_subkriteria = '$id_subkriteria'");
	if($update) {
      echo "<script language=javascript>
          window.alert('Berhasil Mengedit!');
          window.location='sub_kriteria.php';
          </script>";
      }else{
        echo "<script language=javascript>
          window.alert('Gagal Mengedit!');
          window.location='sub_kriteria.php';
          </script>";
      }

}
?>

<?php 
	include ("style/footer.php");
?>