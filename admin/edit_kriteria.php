<?php 
	include ("style/header.php");
	include ("style/sidebar.php");
	include ("../config/koneksi.php");
	$idk = $_GET['id'];
?>
<div class="container-fluid">
	<div class="col-lg-12">
		<!-- Basic Card Example -->
		<div class="card shadow mt-3 mb-3">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Edit Data Kriteria</h6>
			</div>
			<div class="card-body">
				<?php 
					include ("../config/koneksi.php");					
					$qq = mysqli_query($konek, "SELECT * FROM kriteria WHERE id_kriteria = '$idk'");
					$dd = mysqli_fetch_assoc($qq);
				?>
				<form action="" method="POST">
					<input type="hidden" class="form-control" name="idk" value="<?php echo $dd['id_kriteria']; ?>" readonly="">
					<div class="form-group">
						<label>Nama Kriteria</label>
						<input type="text" class="form-control" name="nmk" value="<?php echo $dd['nama_kriteria']; ?>">
					</div>
					<div class="form-group">
						<label>Bobot Preferensi</label>
						<input type="text" class="form-control" name="bobot_pref" value="<?php echo $dd['bobot_pref']; ?>">
					</div>
					<div class="form-group">
						<label>Sifat</label>
						  <select name="sifat" class="form-control mb-2" required="">
             					 <option value="<?php echo $dd['sifat']; ?>"><?php echo $dd['sifat']; ?></option>
              					 <option value="Benefit">Benefit</option>
              					 <option value="Cost">Cost</option>
            			  </select>
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

	$idk	= $_POST['idk'];
	$nmk	= $_POST['nmk'];
	$bobot_pref	= $_POST['bobot_pref'];
	$sifat    = $_POST['sifat'];

	$update = mysqli_query($konek, "UPDATE kriteria SET nama_kriteria = '$nmk', bobot_pref = '$bobot_pref', sifat = '$sifat' WHERE id_kriteria = '$idk'");
	if($update) {
      echo "<script language=javascript>
          window.alert('Berhasil Mengedit!');
          window.location='data_kriteria.php';
          </script>";
      }else{
        echo "<script language=javascript>
          window.alert('Gagal Mengedit!');
          window.location='data_kriteria.php';
          </script>";
      }

}
?>

<?php 
	include ("style/footer.php");
?>