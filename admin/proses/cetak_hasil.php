<?php
include("../../config/koneksi.php");
$idp = $_GET['idp'];
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Cetak Hasil</title>
</head>

<body>
	<link rel="stylesheet" type="text/css" href="style/css/bootstrap.css">
	<center>
		<div class="container">
			<p><img src="style/rumahzakat.png" width="120px" class="mt-3"></p>
			<p style="font-size:25px;padding:0px;margin-bottom:-15px;"><b>Rumah Zakat Kota Padang</b></p>
			<p class="mt-3" style="font-size:18px;padding:0px;margin-bottom:-12px;">Jl. Pemuda 26B Kota Padang</p>
			<br>
			<hr>
			<br>
	</center>
	<?php
	$no = 1;
	$q = mysqli_query($konek, "SELECT * FROM  hasil a LEFT JOIN alternatif b on a.id_alternatif = b.id_alternatif  WHERE a.id_periode = '$idp' ORDER BY a.hasil DESC");
	?>
	<div class="container-fluid">
		<h3 align="center">DATA HASIL</h3>
		<table width="100%" style="text-align: left; border-collapse: collapse; " border="1" class="table table-bordered">
			<tr>
				<thead align="center" class="bg-info">
					<th>No</th>
					<th>Nama </th>
					<th>Hasil Rekomendasi</th>
				</thead>
			</tr>
			<?php
			$no = 1;
			while ($row = mysqli_fetch_array($q)) {
			?>
				<tr>
					<td><?php echo $no; ?></td>
					<td align="center"><?php echo $row['nama_alternatif']; ?></td>
					<td align="center"><?php
										$range = $row['hasil'];
										if ($range >= 0.70) {
											echo "Rekomendasi";
										} else {
											echo "Tidak Rekomendasi";
										}
										?></td>
				</tr>
			<?php
				$no++;
			}
			?>
		</table>
	</div>
	<h5 style="margin-left: 70%;">Padang, <?php echo date('d F Y') ?></h5>
	<p style="margin-left: 70%;">A.n Direktur Rumah Zakat.</p>
	<div style="
			margin-left: 70%;
		  border: 5px solid blue;
		  padding-top: 10px;
		  padding-right: 10px;
		  padding-bottom: 10px;
		  padding-left: 10px;
		">
		<p><img src="style/rumahzakat.png" width="100px">Ditandatangin Secara Elektronik Oleh
			<b style="margin-left: 27%;">Radifan Hilfi Assyuhada</b>
		</p>
	</div>
	</div>
	</center>

</body>