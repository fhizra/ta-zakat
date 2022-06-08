<div class="container-fluid">
					<div align="right">
							<form action="data_alternatif.php" method="get" class="form-cari">
								<input type="text" name="cari" size="40" autofocus placeholder="Masukkan Nama" class="form-control" autocomplete="off" id="keyword" >
								<input type="submit" value="Cari">
					<!-- <img src="img/lowder.gif" class="lowder"> -->
			</form>
			</div>
	</div>
	<?php 
	// tombol cari ditekan
		include("../../config/koneksi.php");
	
	if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	echo "<b>Hasil pencarian : ".$cari."</b>";
}

if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	$sql = mysqli_query($konek,"SELECT * FROM alternatif a LEFT JOIN tbl_narapidana b ON a.id_narapidana = b.id_narapidana LIKE '%".$cari."%'");				
}else{
	$no=1;
	$sql = mysqli_query($konek, "SELECT * FROM alternatif a LEFT JOIN tbl_narapidana b ON a.id_narapidana = b.id_narapidana ");
}
?>