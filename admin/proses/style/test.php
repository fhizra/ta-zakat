<div class="card-body">
				<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_mobil"><i class="fas fa-plus fa-sm"></i> Tambah Data</button>
 
				<table class="table table-bordered">
					<thead>
				<th>A</th>
              <th>B</th>
              <th>C</th>
					
					</thead>
					<?php 
						include("../config/koneksi.php");
						$sql = mysqli_query($konek, "SELECT * FROM tbl_oke ");
						while($array = mysqli_fetch_assoc($sql)){
					?>
					<tbody>
						<tr>
							<td><?php echo $array['A']; ?></td>
							<td><?php echo $array['B']; ?></td>
							<td><?php echo $array['C']; ?></td>
					<?php 
					} 
					?>
				</table>
      </div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_mobil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Entry Data Narapidana</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="" method="POST" enctype="multipart/form-data">
      		<div class="form-group">
           
            <label>A</label>
      			<input type="text" class="form-control mb-2" name="A" placeholder="A" required="">

      			<label>B</label>
            <input type="text" class="form-control mb-2" name="B" required="">

            <label>C</label>
            <input type="text" class="form-control mb-2" name="C" required="">
            <div class="modal-footer">
        <button type="submit" name="tambah" class="btn btn-primary btn-sm">Tambah</button>
      </div>
      	</form>

            <?php 
	include ("../config/koneksi.php");
	if (isset($_POST['tambah'])) {
      
      $A1 		    = $_POST['A'];
      $B1		= $_POST['B'];
      $C1				= $_POST['C'];

	
	$save = mysqli_query($konek,"INSERT INTO tbl_narapidana VALUES($A1','$B1','$C1')");

	if($save) {
      echo "<script language=javascript>
          window.alert('Berhasil Menambah!');
          window.location='data_narapidana.php';
          </script>";
      }else{
        echo "<script language=javascript>
          window.alert('Gagal Menambah!');
          window.location='data_narapidana.php';
          </script>";
      }
}
?>
