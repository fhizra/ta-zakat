<?php
include ("../config/koneksi.php");
$idp = $_GET['idp'];

$delete = mysqli_query($konek,"DELETE FROM alternatif WHERE id_periode = '$idp'");
$delete2 = mysqli_query($konek,"DELETE FROM normalisasi WHERE id_periode = '$idp'");
$delete3 = mysqli_query($konek,"DELETE FROM penilaian WHERE id_periode = '$idp'");
$delete3 = mysqli_query($konek,"DELETE FROM hasil WHERE id_periode = '$idp'");
$delete4 = mysqli_query($konek,"DELETE FROM periode WHERE id_periode = '$idp'");

if($delete) {
	echo "<script language=javascript>
	window.alert('Berhasil Menghapus!');
	window.location='history.php';
	</script>";
}else{
	echo "<script language=javascript>
	window.alert('Gagal Menghapus!');
	window.location='history.php';
	</script>";
}

?>