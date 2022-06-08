<?php 
    include ('style/header.php');
    include ('style/sidebarawal.php');
    include ('../config/koneksi.php');
?>
<div class="container-fluid">
	<!-- Basic Card Example -->
	<div class="card shadow mt-3 mb-3">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-info">Dashboard</h6>
		</div>
		<div class="card-body" align="center">
			<div>
				<h4 class="m-0 font-weight-bold text-info" align="center">Selamat Datang Admin! <img src="../img/rumahzakat.png" width="200px;" align="right"></h4>
			</div><br>
			<h5>Sistem Pendukung Keputusan Pendistribusian Zakat Pada Rumah Zakat Kota Padang</h5>
		</div>
	</div>
    <div class="card shadow mt-3 mb-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Singkat Tentang Metode SAW</h6>
        </div>
        <div class="card-body">
            <h6 class="text-center">SISTEM PENDUKUNG KEPUTUSAN</h6>
            <h7 class="m-5"> Sistem Pendukung Keputusan (SPK) adalah sebuah sistem yang mampu memberikan kemampuan pemecahan masalah 
                maupun kemampuan pengkomunikasian untuk masalah dengan kondisi semi terstruktur dan tak terstruktur. 
                Sistem ini digunakan untuk membantu pengambilan keputusan dalam situasi semi terstruktur dan situasi 
                yang tidak terstruktur, dimana tak seorangpun tahu secara pasti bagaimana keputusan seharusnya dibuat (Turban, 2001).
            </h7>
        </div>
    </div>
    </div>
    <div class="container-fluid mt-3">
        <div class="card shadow mt-3 mb-2">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info">Langkah Penggunaan</h6>
            </div>
            <div class="card-body">
                <h7>
                   1. Mengisi data alternatif penerima pendistribusian zakat<br>
                   2. Mengisi data kriteria<br>
                   3. Mengisi nilai bobot masing-masing kriteria<br>
                   4. Melihat hasil dari rekomendasi keputusan
                </h7>
            </div>
        </div>
    </div>
</div>
<?php 
    include ('style/footer.php');
?>