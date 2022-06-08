<?php 
  include("../config/koneksi.php");  
?>
<link rel="stylesheet" type="text/css" href="style/css/bootstrap.css">
<body >
<center>
	<div class="container">
	<p style="font-size:30px;padding:0px;margin-bottom:-15px;">Rumah Zakat Kota Padang</p>
	<p class="mt-3" style="font-size:18px;padding:0px;margin-bottom:-12px;">Jl. Pemuda 26B Kota Padang</p>
	<br>
	<hr>
</center>
  <?php 
	$no = 1;
	$q = mysqli_query($konek,"SELECT * FROM  alternatif");
?>
<div class="container-fluid">
	<h4 align="center">Data Penerima Zakat (Muzakki)<br></h4>
	<table width="75%" style="text-align: left; border-collapse: collapse; " border="1" class="table table-bordered" >
		<tr>
			<thead class="bg-info" align="center">
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
			<td><?php echo $row[1]; ?></td>
		</tr>
		<?php	
		$no++;
		}
		 ?>
	</table>
</div>
	<h6 style="margin-left: 72%; margin-bottom: 5%;">Padang, <?php echo date('d F Y') ?></h6>
		<br><br>
	<h6 style="margin-left: 72%; margin-bottom: 1%;">Jl. Pemuda 26B Kota Padang</h6> 
</div>
</center>

</body>

<script type="text/javascript" src="style/js/bootstrap.js"></script>
?>