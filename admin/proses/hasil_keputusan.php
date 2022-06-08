<?php
include("style/header.php");
include("style/sidebar.php");
include '../../config/koneksi.php';
$idp = $_GET['idp'];
?>
<div class="container-fluid">
	<div class="col-lg-12">
		<!-- Basic Card Example -->
		<div class="card shadow mt-3 mb-3">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-info">Data Hasil Proses Perhitungan</h6>
			</div>
			<!-- Data 2 -->
			<div class="card-body">
				<h6><b>Data Hasil Perankingan</b></h6>
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr align="center">
								<th style="font-size: 16px;">No</th>
								<th style="font-size: 16px;">Nama Alternatif</th>
								<th style="font-size: 16px;">Nilai Preferensi (V)</th>
								<th style="font-size: 16px;">Hasil Rekomendasi</th>
							</tr>
						</thead>
						<tbody>
							<!-- Tampil Hasil -->
							<?php
							include('../../config/koneksi.php');
							$noo = 1;
							$qq = mysqli_query($konek, "SELECT * FROM hasil a LEFT JOIN alternatif b ON a.id_alternatif=b.id_alternatif WHERE a.id_periode = '$idp' ORDER BY a.hasil DESC");
							while ($dd = mysqli_fetch_assoc($qq)) {
							?>
								<tr>
									<td align="right" style="font-size: 15px; text-align: center"><?php echo $noo; ?></td>

									<td style="font-size: 16px; text-align: center"><?php echo $dd['nama_alternatif']; ?></td>

									<td style="font-size: 16px; text-align: center"><?php echo $dd['hasil']; ?></td>

									<td style="font-size: 16px; text-align: center">
										<?php
										$range = $dd['hasil'];
										if ($range >= 0.70) {
											echo "Rekomendasi";
										} else {
											echo "Tidak Rekomendasi";
										}
										?></td>
								</tr>
							<?php
								$noo++;
							}
							?>
						</tbody>
					</table>
				</div>
			</div></div>
			<?php
			$sqlrank = mysqli_query($konek, "SELECT *  FROM hasil a LEFT JOIN alternatif b on a.id_alternatif = b.id_alternatif WHERE a.id_periode = '$idp' ORDER BY a.hasil DESC LIMIT 1");
			$rank = mysqli_fetch_array($sqlrank);
			?>
			<div class="card shadow mt-3 mb-3">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-info">Data Hasil Kesimpulan</h6>
				</div>
				<div class="card-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th colspan="6"><label style="font-size: 15px;"><i style="color : orange;">* Nilai standar untuk mendapatkan penerima zakat adalah 0.70</i></th>
							</tr>
							<tr align="center">
								<th style="font-size: 16px;">No</th>
								<th style="font-size: 16px;">Nama Alternatif</th>

							</tr>
						</thead>
						<tbody>
							<?php
							include('../../config/koneksi.php');
							$noo1 = 1;
							$qq = mysqli_query($konek, "SELECT * FROM hasil a LEFT JOIN alternatif b ON a.id_alternatif=b.id_alternatif WHERE a.id_periode = '$idp' AND a.hasil >= 0.70 ORDER BY a.hasil DESC");
							while ($dd = mysqli_fetch_assoc($qq)) {
							?>
								<tr>
									<td align="right" style="font-size: 16px; text-align: center"><?php echo $noo1++; ?></td>
									<td style="font-size: 16px; text-align: center"><?php echo $dd['nama_alternatif']; ?></td>

								</tr>
							<?php
							}
							?>
							<tr>
								<td colspan="6"><a target="_blank" class="btn btn-sm btn-success mb-3" href="cetak_hasil.php?idp=<?php echo $idp; ?>"><i class="fas fa-print"></i> Cetak</a></td>
							</tr>
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
</div>

<?php
include("style/footer.php");
?>