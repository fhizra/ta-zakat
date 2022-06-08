<?php 
  include("../../config/koneksi.php");
  $sql = mysqli_query($konek,"SELECT * FROM periode WHERE id_periode = 'id_periode'");
  $data = mysqli_fetch_array($sql);
?>
<link rel="stylesheet" type="text/css" href="style/css/bootstrap.css">
<title>Laporan Alternatif</title>
<body>
<center>
	<div class="container">
<p><img src="style/rumahzakat.png" width="180px" class="mt-3"></p>
<p style="font-size:25px;padding:0px;margin-bottom:-15px;"><b>Rumah Zakat Kota Padang</b></p>
<p class="mt-3" style="font-size:18px;padding:0px;margin-bottom:-12px;">Jl. Pemuda 26B Kota Padang</p>
<br>
<hr>
<br>
</center>
  <?php 
	$no = 1;
	$q = mysqli_query($konek,"SELECT * FROM alternatif");
?>
<div class="container-fluid">
	<h4 align="center">DATA ALTERNATIF <br><?php echo $data['keterangan']; ?></h4>
	<table width="75%" style="text-align: left; border-collapse: collapse; " border="1" class="table table-bordered" >
		<tr>
			<thead class="bg-info">
			<th>No</th>
			<th>Nama Alternatif</th>
		</thead>
		</tr>
		<?php 
		$no = 1;
		while ($row = mysqli_fetch_array($q)) {
			?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $row["nama_alternatif"]; ?></td>
		</tr>
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
<p><img src="style/rumahzakat.png" width="100px">Ditandatangin Secara Elektronik Oleh
<b style="margin-left: 27%;">Radifan Hilfi Assyuhada</b></p>
</h4>
</div>
</center>

</body>

<script type="text/javascript" src="style/js/bootstrap.js"></script>