<?php
include ("../../config/koneksi.php");
$id_alternatif= $_GET['id'];
$idp = $_GET['idp'];

$sql1 = mysqli_query($konek,"SELECT * FROM alternatif WHERE id_alternatif='$id_alternatif'");
$data1 = mysqli_fetch_array($sql1);
$delete = mysqli_query($konek,"DELETE FROM alternatif WHERE id_alternatif = '$id_alternatif'");

if($delete) {
	echo "<script language=javascript>
	window.alert('Berhasil Menghapus!');
	window.location='data_alternatif.php?idp=$idp';
	</script>";
}else{
	echo "<script language=javascript>
	window.alert('Gagal Menghapus!');
	window.location='data_alternatif.php?idp=$idp';
	</script>";
}

?>