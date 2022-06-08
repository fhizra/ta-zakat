<?php
include ("../config/koneksi.php");
$idk= $_GET['id'];
// $idp = $_GET['idp'];

$delete = mysqli_query($konek,"DELETE FROM subkriteria WHERE id_subkriteria = '$idk'");
if($delete) {
	echo "<script language=javascript>
	window.alert('Berhasil Menghapus!');
	window.location='sub_kriteria.php';
	</script>";
}else{
	echo "<script language=javascript>
	window.alert('Gagal Menghapus!');
	window.location='sub_kriteria.php';
	</script>";
}

?>