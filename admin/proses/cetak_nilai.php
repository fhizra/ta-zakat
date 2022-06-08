<?php
include("../../config/koneksi.php");
//   

$idp = $_GET['idp'];
$sql = mysqli_query($konek, "SELECT * FROM periode WHERE id_periode = '$idp'");
$data = mysqli_fetch_array($sql);
?>
<title>Data Penilaian</title>

<body onload="window.print();">
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
	$q = mysqli_query($konek, "SELECT * FROM penilaian a LEFT JOIN alternatif b ON a.id_alternatif = b.id_alternatif WHERE a.id_periode = '$idp'");
	?>
	<div class="container-fluid">
		<h3 align="center">DATA PENILAIAN <br><?php echo $data['keterangan']; ?></h3>
		<table width="100%" style="text-align: left; border-collapse: collapse; " border="1" class="table table-bordered">
			<tr>
				<thead class="bg-info">
					<th>No</th>
					<!-- <th>ID Alternatif</th> -->
					<th>Nama Alternatif</th>
					<?php
					$sqlth = $konek->query("SELECT * FROM kriteria");
					while ($rowth = $sqlth->fetch_array()) {
					?>
						<th><?= $rowth['nama_kriteria']; ?></th>
					<?php
					}
					?>
				</thead>
			</tr>
			<?php
			$no = 1;
			$query = mysqli_query($konek, "SELECT DISTINCT * FROM penilaian a JOIN alternatif b ON a.id_alternatif = b.id_alternatif WHERE a.id_periode = '$idp' GROUP BY a.id_alternatif");
			while ($data = mysqli_fetch_assoc($query)) {
				$idalt = $data['id_alternatif'];
				$nmalt = $data['nama_alternatif'];
				$idsub = $data['id_subkriteria'];
			?>
				<tbody>
					<tr>
						<td><?= $no; ?></td>
						<td><?= $nmalt; ?></td>
						<?php
						$query2 = $konek->query("SELECT * FROM penilaian a JOIN subkriteria b ON a.id_subkriteria = b.id_subkriteria WHERE a.id_alternatif = '$idalt' AND a.id_periode = '$idp'");
						while ($rowq2 = $query2->fetch_array()) {
						?>
							<td><?= $rowq2['bobot']; ?></td>
						<?php
						}
						?>
					</tr>
				</tbody>
			<?php
				$no++;
			}
			?>
		</table>
	</div>
	<h5 style="margin-left: 70%;">Padang, <?php echo date('d F Y') ?></h5>
	<p style="margin-left: 70%;">A.n Direktur Rumah Zakat</p>
	<div style="
		  margin-left: 70%;
		  border: 5px solid blue;
		  padding-top: 10px;
		  padding-right: 10px;
		  padding-bottom: 10px;
		  padding-left: 10px;
		">
		<p><img src="style/rumahzakat.png" width="110px">Ditandatangin Secara Elektronik Oleh
			<b style="margin-left: 27%;">Radifan Hilfi Assyuhada</b>
		</p>
	</div>
	</div>
	</center>

</body>
?>