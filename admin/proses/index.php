<?php 
    include ('style/header.php');
    include ('style/sidebar.php');
    include ('../../config/koneksi.php');
$periode = $_GET['idp'];
$sql = mysqli_query($konek,"SELECT * FROM periode WHERE id_periode = '$periode'");
$row = mysqli_fetch_array($sql);
?>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 6px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 10px;
  padding-bottom: 10px;
  text-align: left;
  background-color: #5fc5cf;
  color: white;
}

</style>
<div class="container-fluid">
	<!-- Basic Card Example -->
	<div class="card shadow mt-3 mb-3">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-info">Dashboard</h6>
		</div>
		<div class="card-body" align="center">
			<p class="h3">Sistem Pendukung Keputusan Penerima Zakat pada Rumah Zakat Kota Padang</p>
			<br><p class="h5" style="color: orange"><b><?php echo $row['keterangan']; ?></b></p><br>
			<table class="table	table-bordered" id="customers">
				<tr>
					<th colspan="3"><div align="center">ASPEK YANG DINILAI</div></th>
				</tr>
				<tr>
					<th><div align="center">No.</div></th>
					<th><div align="center">Kriteria</div></th>
					<th><div align="center">Persentase</div></th>
				</tr>
				<?php 
				$no = 1;
				$sqlkriteria = mysqli_query($konek,"SELECT * FROM kriteria ORDER BY id_kriteria ASC");
				while ($array = mysqli_fetch_array($sqlkriteria)) {
					?>
					<tr>
					<td><div align="center"><?php echo $no; ?></div></td>
					<td><?php echo $array['nama_kriteria']; ?></td>
					<td><?php echo $array['bobot_pref']; ?></td>
					</tr>
					<?php
					$no++;
				}
				 ?>
			</table>
		</div>
	</div>
</div>
<?php 
    include ('style/footer.php');
?>