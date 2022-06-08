<?php 
    include ('style/header.php');
    include ('style/sidebar.php');
	include("../../config/koneksi.php");
	$id_alternatif = $_GET['id'];
	$idp = $_GET['idp'];
?>
<div class="container-fluid">
	<!-- Basic Card Example -->
	<div class="card shadow mt-3 mb-3">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-info">Data Alternatif</h6>
		</div>
		<div class="card-body">
		<?php 
			$query = mysqli_query($konek,"SELECT * FROM alternatif WHERE id_alternatif = '$id_alternatif'")or die(mysqli_error());
			while($data = mysqli_fetch_array($query)){
		?>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label>Nama Alternatif</label>
      			<input type="text" class="form-control mb-2" name="nama_alternatif" value="<?php echo $data['nama_alternatif']; ?>">
      		</div>
      	</div>
      	<div class="modal-footer">
      		<button type="submit" name="edit" class="btn btn-success btn-sm" >Edit</button>
      	</div>
		</form>
		<?php 
		}
		?>
	</div>
</div>

<?php
include ("../../config/koneksi.php");
if(isset($_POST['edit'])) {
$nama_alternatif 		= $_POST['nama_alternatif'];

// SQL alternatif
$sql3 = mysqli_query($konek,"UPDATE alternatif SET nama_alternatif = '$nama_alternatif' WHERE id_alternatif ='$id_alternatif'"); // Eksekusi/ Jalankan query dari variabel $query

	if($sql3){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		
		echo "<script language=javascript>
				window.alert('Berhasil Mengedit!');
				window.location='data_alternatif.php?idp=$idp';
				</script>"; // Redirect ke halaman dataalternatif.php
	}else{
		// Jika Gagal, Lakukan :
		echo "<script language=javascript>
				window.alert('Gagal Mengedit!');
				window.location='data_alternatif.php?idp=$idp';
				</script>";
	}
}
?>

<?php 
    include ('style/footer.php');
?>