<?php 
include "../../config/koneksi.php";

$id_a=$_GET['id'];
$idp = $_GET['idp'];
$delete = mysqli_query($konek,"DELETE From penilaian Where id_alternatif ='$id_a'");

if($delete) {
	echo "<script language=javascript>
	window.alert('Berhasil Menghapus!');
	window.location='data_penilaian.php?idp=$idp';
	</script>";
}else{
	echo "<script language=javascript>
	window.alert('Gagal Menghapus!');
	window.location='data_penilaian.php?idp=$idp';
	</script>";
}
?>

