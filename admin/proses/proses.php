<?php
include("style/header.php");
include("style/sidebar.php");
include '../../config/koneksi.php';
?>
<div class="container-fluid">
	<div class="col-lg-12">
		<!-- Basic Card Example -->
		<div class="card shadow mt-3 mb-3">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-info">Data Proses Perhitungan</h6>
			</div>
			<!-- Data 1 -->
			<div class="card-body">
				<h6><b>Data Nilai Bobot (W)</b></h6>
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr align="center">
								<!-- Tampil Data Kriteria -->
								<?php
								$sqltr = mysqli_query($konek, "SELECT * FROM kriteria");
								while ($rowtr = $sqltr->fetch_array()) {
								?>
									<th><?= $rowtr['nama_kriteria']; ?></th>
								<?php
								}

								?>

							</tr>
							<tr align="center">
								<!-- Tampil data Jenis Kriteria -->
								<?php
								$sqltr = mysqli_query($konek, "SELECT * FROM kriteria");
								while ($rowtr = $sqltr->fetch_array()) {
								?>
									<th><?= $rowtr['sifat']; ?></th>
								<?php
								}

								?>
							</tr>
						</thead>
						<tbody>
							<tr align="center">
								<!-- Tampil Data Penilaian -->
								<?php
								$sqltr = mysqli_query($konek, "SELECT * FROM kriteria");
								while ($rowtr = $sqltr->fetch_array()) {
								?>
									<td><?= $rowtr['bobot_pref']; ?></td>
								<?php
								}

								?>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<!-- Data 2 -->
			<div class="card-body">
				<h6><b>Data Penilaian</b></h6>
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr align="center">
								<th>No</th>
								<th>Nama Alternatif</th>
								<?php
								$sqlth = $konek->query("SELECT * FROM kriteria");
								while ($rowth = $sqlth->fetch_array()) {
								?>
									<th><?= $rowth['nama_kriteria']; ?></th>
								<?php
								}
								?>
							</tr>
						</thead>
						<tbody>
							<?php
							include('../../config/koneksi.php');
							$no = 1;
							$qq = mysqli_query($konek, "SELECT DISTINCT * FROM penilaian a LEFT JOIN alternatif b ON a.id_alternatif=b.id_alternatif WHERE a.id_periode = '$idp' GROUP BY a.id_alternatif");
							$rowq = mysqli_num_rows($qq);
							if ($rowq > 0) {
							?>
								<!-- Menampilkan nilai -->
								<?php
								$query = mysqli_query($konek, "SELECT DISTINCT * FROM penilaian a LEFT JOIN alternatif b ON a.id_alternatif=b.id_alternatif WHERE a.id_periode = '$idp' GROUP BY a.id_alternatif");
								while ($data = mysqli_fetch_array($query)) {
									$idalt = $data['id_alternatif'];
									$nmalt = $data['nama_alternatif'];
									$idsub = $data['id_subkriteria'];

								?>
									<tr>
										<td align="center"><?php echo $no++; ?></td>
										<td><?php echo $nmalt; ?></td>
										<?php
										$query2 = $konek->query("SELECT * FROM penilaian a JOIN subkriteria b ON a.id_subkriteria = b.id_subkriteria WHERE a.id_alternatif = '$idalt' AND a.id_periode = '$idp'");
										while ($rowq2 = $query2->fetch_array()) {
										?>
											<td align="center"><?= $rowq2['bobot']; ?></td>
										<?php
										}
										?>
									</tr>
								<?php
								}
							} else {
								?>
								<td colspan="7">
									<center>
										<h3>Data penilaian kosong</h3>
									</center>
								</td>
							<?php

							}
							?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- Data 2 -->
			<div class="card-body">
				<h6><b>Data Hasil Perhitungan Normalisasi</b></h6>
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr align="center">
								<th style="font-size: 16px;">No</th>
								<th style="font-size: 16px;">Nama Alternatif</th>
								
								<?php
								$sqlth = $konek->query("SELECT * FROM kriteria");
								while ($rowth = $sqlth->fetch_array()) {
								?>
									<th><?= $rowth['nama_kriteria']; ?></th>
								<?php
								}
								?>
						</thead>

						<tbody>
						<?php 
							include ('../../config/koneksi.php');
							$no = 1;
							$qq = mysqli_query($konek, "SELECT DISTINCT * FROM penilaian a LEFT JOIN alternatif b ON a.id_alternatif=b.id_alternatif WHERE a.id_periode = '$idp' GROUP BY a.id_alternatif");
							$rowq = mysqli_num_rows($qq);
							if ($rowq > 0) {
								while($dd = mysqli_fetch_assoc($qq)){
						?>
							<tr>
								<td align="right"><?php echo $no++; ?></td>
								<td><?php echo $dd['nama_alternatif']; ?></td>
								
							</tr>
							<?php 
								}
								
							}else {
								?>
								<td colspan="7"><center><h3>Semua data penilaian sudah diproses.</h3></center></td>
								<?php  

							}
							?>
						<?php
							$sqlp1 = $konek->query("SELECT DISTINCT * FROM penilaian WHERE id_periode = '$idp' GROUP BY id_alternatif");
							while ($rowp1 = $sqlp1->fetch_array()) {
								$idalt = $rowp1['id_alternatif'];
								$sqlcek = mysqli_query($konek,"SELECT * FROM hasil WHERE id_periode = '$idp' AND id_alternatif = '$idalt'");
								$ceksql2 = mysqli_num_rows($sqlcek);
									if ($ceksql2 >0){
										
						          	}else{
										$sqlkrt = $konek->query("SELECT * FROM kriteria");
										$nc = 0;
										while ($rowkrt = $sqlkrt->fetch_array()) {
											$idkrt = $rowkrt['id_kriteria'];
											$jnkrt = $rowkrt['sifat'];
											$bobot = $rowkrt['bobot_pref'];
											$sqlp2 = $konek->query("SELECT * FROM penilaian a JOIN subkriteria b on a.id_subkriteria = b.id_subkriteria JOIN kriteria c ON b.id_kriteria = c.id_kriteria WHERE a.id_alternatif = '$idalt' AND a.id_periode = '$idp' AND c.id_kriteria = '$idkrt' ");
											while ($rowp2 = $sqlp2->fetch_array()) {
												if ($jnkrt == "Benefit") {
													$sqlceknilai = $konek->query("SELECT MAX(bobot) as n FROM penilaian a join subkriteria b on a.id_subkriteria = b.id_subkriteria JOIN kriteria c ON b.id_kriteria = c.id_kriteria WHERE a.id_periode = '$idp' AND c.id_kriteria = '$idkrt' ");
													$rown = $sqlceknilai->fetch_array();
													$n = $rown['n'];
													$c = $rowp2['bobot'];
													$c = $c / $n;
												} else {
													$sqlceknilai = $konek->query("SELECT MIN(bobot) as n FROM penilaian a JOIN subkriteria b on a.id_subkriteria = b.id_subkriteria JOIN kriteria c ON b.id_kriteria = c.id_kriteria WHERE a.id_periode = '$idp' AND c.id_kriteria = '$idkrt' ");
													$rown = $sqlceknilai->fetch_array();
													$n = $rown['n'];
													$c = $rowp2['bobot'];
													$c = $n / $c;
												}
												echo "<td>".$nc += ($c * $bobot)."</td>";
											}
										}
									}
										$simpanakhir = $konek->query("INSERT INTO hasil VALUES ('','$idalt','$idp','$nc')");		
							}
						?>
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>