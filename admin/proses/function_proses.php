<?php 
	$idp = $_GET['idp'];
	  //kriteria1
    $sqlc1 = mysqli_query($konek,"SELECT nama_kriteria,sifat,bobot_pref FROM kriteria WHERE id_kriteria = '1'");
    $data1 = mysqli_fetch_array($sqlc1);
    $jenis1 = $data1['sifat'];
    $k1 = $data1[0];
    $b1 = $data1[1];
    //kriteria2
    $sqlc2 = mysqli_query($konek,"SELECT nama_kriteria,sifat,bobot_pref FROM kriteria WHERE id_kriteria = '2'");
    $data2 = mysqli_fetch_array($sqlc2);
    $jenis2 = $data2['sifat'];
    $k2 = $data2[0];
    $b2 = $data2[1];
    //kriteria3
    $sqlc3 = mysqli_query($konek,"SELECT nama_kriteria,sifat,bobot_pref FROM kriteria WHERE id_kriteria = '3'");
    $data3 = mysqli_fetch_arjojoray($sqlc3);
    $jenis3 = $data3['sifat'];
    $k3 = $data3[0];
    $b3 = $data3[1];
    //kriteria4
    $sqlc4 = mysqli_query($konek,"SELECT nama_kriteria,sifat,bobot_pref FROM kriteria WHERE id_kriteria = '4'");
    $data4 = mysqli_fetch_array($sqlc4);
    $jenis4 = $data4['sifat'];
    $k4 = $data4[0];
    $b4 = $data4[1];
    //kriteria5
    $sqlc5 = mysqli_query($konek,"SELECT nama_kriteria,sifat,bobot_pref FROM kriteria WHERE id_kriteria = '5'");
    $data5 = mysqli_fetch_array($sqlc5);
    $jenis5 = $data5['sifat'];
    $k5 = $data5[0];
    $b5 = $data5[1];
    
//data max min 
    //c1
   if ($jenis1 == "Benefit") {
   		$sqlm1 = mysqli_query($konek,"SELECT MAX(c1) as max_c1 FROM penilaian WHERE id_periode = '$idp'");
    	$datam1 = mysqli_fetch_array($sqlm1);
    	$nm1 = $datam1['max_c1'];
    	$jns1 = "MAX";
   }else{
   		$sqlm1 = mysqli_query($konek,"SELECT MIN(c1) as min_c1 FROM penilaian WHERE id_periode = '$idp'");
    	$datam1 = mysqli_fetch_array($sqlm1);
    	$nm1 = $datam1['max_c1'];
    	$jns1 = "MIN";
   }
//data max min 
    //c2
   if ($jenis2 == "Benefit") {
   		$sqlm2 = mysqli_query($konek,"SELECT MAX(c2) as max_c2 FROM penilaian WHERE id_periode = '$idp'");
    	$datam2 = mysqli_fetch_array($sqlm2);
    	$nm2 = $datam2['max_c2'];
    	$jns2 = "MAX";
   }else{
   		$sqlm2 = mysqli_query($konek,"SELECT MIN(c2) as min_c2 FROM penilaian WHERE id_periode = '$idp'");
    	$datam2 = mysqli_fetch_array($sqlm2);
    	$nm2 = $datam2['max_c3'];
    	$jns2 = "MIN";
   }
//data max min 
    //c3
   if ($jenis3 == "Benefit") {
   		$sqlm3 = mysqli_query($konek,"SELECT MAX(c3) as max_c3 FROM penilaian WHERE id_periode = '$idp'");
    	$datam3 = mysqli_fetch_array($sqlm3);
    	$nm3 = $datam3['max_c3'];
    	$jns3 = "MAX";
   }else{
   		$sqlm3 = mysqli_query($konek,"SELECT MIN(c3) as min_c3 FROM penilaian WHERE id_periode = '$idp'");
    	$datam3 = mysqli_fetch_array($sqlm3);
    	$nm3 = $datam3['min_c3'];
    	$jns3 = "MIN";
   }
//data max min 
    //c4
   if ($jenis4 == "Benefit") {
   		$sqlm4 = mysqli_query($konek,"SELECT MAX(c4) as max_c4 FROM penilaian WHERE id_periode = '$idp'");
    	$datam4 = mysqli_fetch_array($sqlm4);
    	$nm4 = $datam4['max_c4'];	
    	$jns4 = "MAX";
   }else{
   		$sqlm4 = mysqli_query($konek,"SELECT MIN(c4) as min_c4 FROM penilaian WHERE id_periode = '$idp'");
    	$datam4 = mysqli_fetch_array($sqlm4);
    	$nm4 = $datam4['min_c4'];
    	$jns4 = "MIN";
   }
//data max min 
    //c5
   if ($jenis5 == "Benefit") {
   		$sqlm5 = mysqli_query($konek,"SELECT MAX(c5) as max_c5 FROM penilaian WHERE id_periode = '$idp'");
    	$datam5 = mysqli_fetch_array($sqlm5);
    	$nm5 = $datam5['max_c5'];	
    	$jns5 = "MAX";
   }else{
   		$sqlm5 = mysqli_query($konek,"SELECT MIN(c5) as min_c5 FROM penilaian WHERE id_periode = '$idp'");
    	$datam5 = mysqli_fetch_array($sqlm5);
    	$nm5 = $datam5['min_c5'];
    	$jns5 = "MIN";
   }


   //proses
   $sqlp1 = mysqli_query($konek,"SELECT * FROM penilaian WHERE id_periode = '$idp'");
							while ($row = mysqli_fetch_array($sqlp1)) {
								//tangkap data penilaian
								$ida = $row['id_alternatif'];
								$c1 = $row['c1'];
								$c2 = $row['c2'];
								$c3 = $row['c3'];
								$c4 = $row['c4'];
								$c5 = $row['c5'];
								
								//lakukan proses normalisasi
								//c1
								if ($jenis1 == "Benefit") {	
									$c1 = $c1 / $nm1;
								}else{
									$c1 = $nm1 / $c1;
								}
								//c2
								if ($jenis2 == "Benefit") {	
									$c2 = $c2 / $nm2;
								}else{
									$c2 = $nm2 / $c2;
								}
								//c3
								if ($jenis3 == "Benefit") {	
									$c3 = $c3 / $nm3;
								}else{
									$c3 = $nm3 / $c3;
								}
								//c4
								if ($jenis4 == "Benefit") {	
									$c4 = $c4 / $nm4;
								}else{
									$c4 = $nm4 / $c4;
								}
								//c5
								if ($jenis5 == "Benefit") {	
									$c5 = $c5 / $nm5;
								}else{
									$c5 = $nm5 / $c5;
								}
								
								//pencarian hasil
								$nilai_akhir = ($c1 * $b1) + ($c2 * $b2) + ($c3 * $b3) + ($c4 * $b4) + ($c5 * $b5); 
								//simpan normalisasi
								$sqlsimpans = mysqli_query($konek,"INSERT INTO normalisasi VALUES ('','$ida','$idp','$c1','$c2','$c3','$c4','$c5')");
								//simpan pencarian hasil
								$sqlsimpans2 = mysqli_query($konek,"INSERT INTO hasil VALUES ('','$ida','$idp','$nilai_akhir')");
							}
							 if (($sqlsimpans)&&($sqlsimpans2)){
							 	  echo "<script language=javascript>
          							window.alert('Berhasil Menambah!');
          							window.location='hasil_keputusan.php?idp=$idp';
          							</script>";
      							}else{
        							echo "<script language=javascript>
         									 window.alert('Gagal Menambah!');
         									 window.location='hasil_keputusan.php?idp=$idp';
          									</script>";
     									 }
 ?>