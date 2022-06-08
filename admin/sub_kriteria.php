<?php 
	include ("style/header.php");
	include ("style/sidebarawal.php");
	  // $idp = $_GET['idp'];
?>
<div class="container-fluid">
	<div class="col-lg-12">
		<!-- Basic Card Example -->
		<div class="card shadow mt-3 mb-3">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-info">Data Sub Kriteria</h6>
			</div>
			<div class="card-body">
				<button class="btn btn-sm btn-info mb-3" data-toggle="modal" data-target="#tambah_bank"><i class="fas fa-plus fa-sm"></i> Tambah Sub Kriteria</button>
        <!-- <div class="col-4" align="right">
        <select name="id_kriteria" id="" class="form-control">
            <option value="">Semua Kriteria</option>;
              <?php 
                include("../config/koneksi.php");
                $sqlkriteria = mysqli_query($konek,"SELECT * FROM kriteria");
                while ($row = mysqli_fetch_array($sqlkriteria)) {
              ?>
            <option value="<?php echo $row['id_kriteria'] ?>"><?php echo $row['nama_kriteria']; ?></option>
              <?php
                }
              ?>
              <?php 
              if(isset($_GET['pilih'])){
                $pilih = $_GET['pilih'];
                echo "<b>Hasil pencarian : ".$pilih."</b>";
              }
              ?>
              <?php 
              if(isset($_GET['pilih'])){
                $pilih = $_GET['pilih'];
                $data = mysqli_query($konek,"select * from subkriteria where nama_kriteria= '$pilih'");        
              } else {
                $data = mysqli_query($konek,"select * from subkriteria");   
              }
              ?>
        </select>
      </div><br> -->
        <div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr align="center">
							<th>No</th>
							<th>Nama Kriteria</th>
							<th>Bobot</th>
							<th>Keterangan</th>
							<th colspan="2">Aksi</th>
						</tr>
					</thead>
					<?php 
						include("../config/koneksi.php");
						$no=1;
						$sql = mysqli_query($konek, "SELECT id_subkriteria,bobot,keterangan,nama_kriteria,id_kriteria FROM subkriteria INNER JOIN kriteria USING(id_kriteria)");
						while($array = mysqli_fetch_assoc($sql)){
					?>
					<tbody>
						<tr align="center">
							<td><?php echo $no++; ?></td>
							<td align="left"><?php echo $array['nama_kriteria']; ?></td>
							<td><?php echo $array['bobot']; ?></td>
							<td><?php echo $array['keterangan']; ?></td>
							<td>
								<a href="edit_subkriteria.php?id=<?php echo $array['id_subkriteria']; ?>"><i class="btn btn-success btn-sm"><span class="fas fa-edit"></span></i></a></td>
							<td>
								<a href="hapus_subkriteria.php?id=<?php echo $array['id_subkriteria']; ?>"><i class="btn btn-danger btn-sm"><span class="fas fa-trash"></span></i></a></td>
						</tr>
					</tbody>
					<?php 
					} 
					?>
				</table>
      	</div>
			</div>
</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_bank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Entry Data Sub Kriteria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="" method="POST" enctype="multipart/form-data">
      		<div class="form-group">
      			<!-- <input type="hidden" class="form-control mb-2" name="id" value="<?php echo $_SESSION['id']; ?>"> -->
                <label for="sub kriteria">Nama Kriteria</label>
                <select name="id_kriteria" id="" class="form-control">
                    <option>--Pilih Kriteria</option>
                <?php 
                    include("../config/koneksi.php");
                      $sqlkriteria = mysqli_query($konek,"SELECT * FROM kriteria");
                      while ($row = mysqli_fetch_array($sqlkriteria)) {
                        ?>
                        <option value="<?php echo $row['id_kriteria'] ?>"><?php echo $row['nama_kriteria']; ?></option>
                        <?php
                      }
                       ?>
                    </select>
               	<label>Nilai Bobot</label>
      			<input type="text" name="bobot" class="form-control mb-2" placeholder="Nilai Bobot">

                <label>Keterangan</label>
      			<input type="text" class="form-control mb-2" name="keterangan" placeholder="Sub Kriteria" required="">
            
      		</div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="tambah" class="btn btn-info btn-sm">Tambah</button>
      </div>
      	</form>
    </div>
  </div>
</div>


<?php 
	include ("../config/koneksi.php");
	if (isset($_POST['tambah'])) {
        $query2 = mysqli_query($konek,"SELECT * FROM subkriteria ORDER BY id_subkriteria DESC");
        $data2 = mysqli_fetch_assoc($query2);
        $jml = mysqli_num_rows($query2);
        if($jml==0){
          $idk='S001';
          }else{
            $subid = substr($data2['id_subkriteria'],3);
            if($subid>0 && $subid<=8){
              $sub = $subid+1;
              $idk='S00'.$sub;
            }elseif($subid>=9 && $subid<=100){
              $sub = $subid+1;
              $idk='S0'.$sub;
            }elseif($subid>=99 && $subid<=1000){
              $sub = $subid+1;
              $idk='S'.$sub;
            }
          }
          $id_kriteria = $_POST['id_kriteria'];
          $bobot = $_POST['bobot'];
          $keterangan = $_POST['keterangan'];
          $save = mysqli_query($konek,"INSERT INTO subkriteria VALUES ('$idk','$id_kriteria','$bobot','$keterangan')");

	if($save) {
      echo "<script language=javascript>
          window.alert('Berhasil Menambah!');
          window.location='sub_kriteria.php';
          </script>";
      }else{
        echo "<script language=javascript>
          window.alert('Gagal Menambah!');
          window.location='sub_kriteria.php';
          </script>";
      }
}
?>

<?php 
	include ("style/footer.php");
?>