<?php 
    include ('style/header.php');
    include ('style/sidebar.php');
	include("../../config/koneksi.php");
	$ids = $_GET['id'];
	$sqlcek = mysqli_query($konek,"SELECT * FROM alternatif WHERE id_alternatif = '$ids'");
	$data = mysqli_fetch_array($sqlcek);
?>
<div class="container-fluid">
	<!-- Basic Card Example -->
	<div class="card shadow mt-3 mb-3">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Edit Data Penilaian <?php echo $data['nama_alternatif']; ?></h6>
		</div>
		<div class="card-body">
		<?php 
			$query = mysqli_query($konek,"SELECT * FROM penilaian WHERE id_alternatif='$ids'");
			// while($data = mysqli_fetch_array($query)){
		?>
		<form action="" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="ids" value="<?php echo $ids; ?>">
			<div class="form-group">
              <input type="hidden" name="ids" value="<?php echo $ids; ?>">
      				<!-- C1 -->
      		<!-- Loop -->
              <?php 
				  $c = 1;
				  $x = 1;
				 	$sqlnilai = $konek->query("SELECT * FROM kriteria");
					 while($rownilai = $sqlnilai->fetch_array()){
						 ?>
							<label><?php echo $rownilai['nama_kriteria']; ?> (C<?= $c++; ?>)</label>
								<select name="k<?= $x; ?>" class="form-control mb-2">
								<option value="#">---Pilih Nilai---	</option>
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
      		<button type="submit" name="edit" class="btn btn-success btn-sm" >Edit</button>
      	</div>
		</form>
	</div>
		<?php 
		// }
		?>
	</div>
</div>


<?php
include ("../../config/koneksi.php");

if(isset($_POST['edit'])) {
$sqlcekproses = $konek->query("SELECT * FROM hasil WHERE id_periode = '$idp'");
$rowcekproses = $sqlcekproses->num_rows;
if ($rowcekproses > 0) {
    $query2 = mysqli_query($konek,"SELECT * FROM kriteria");
	$rq2 = $query2->num_rows;
	for ($i=1; $i <= $rq2 ; $i++) { 
        $sqlceknilai = $konek->query("SELECT * FROM penilaian a JOIN subkriteria b ON a.id_subkriteria = b.id_subkriteria JOIN kriteria c ON b.id_kriteria = c.id_kriteria WHERE b.id_kriteria = '$i' AND id_alternatif = '$ids'");
    	$rowceknilai = $sqlceknilai->fetch_array();
    	$id_sub = $rowceknilai['id_subkriteria'];
    // echo "<script>alert('ID Subkriteria : $id_sub')</script>";
    
		$n = $_POST["k$i"];
	     $sqledit = mysqli_query($konek,"UPDATE penilaian SET id_subkriteria = '$n' WHERE id_subkriteria ='$id_sub' AND id_alternatif = '$ids' AND id_periode = '$idp'");
	
         // Eksekusi/ Jalankan query dari variabel $query
         echo "<script>
		 window.alert('Berhasil!');
		 window.location='data_penilaian.php?idp=$idp';
		 </script>";
    }
} else {
   echo "<script language=javascript>
			 window.alert('Ada kesalahan pada proses edit!');
			 window.location='data_penilaian.php?idp=$idp';
			 </script>";
}
}

?>

<?php 
    include ('style/footer.php');
?>