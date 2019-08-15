<?php
if(isset($_GET['id'])){
	$query = dapatkandatapilihan($_GET['halaman'],'id_jadwal',$_GET['id']);
	if(mysqli_num_rows($query) != 0){
		$r = mysqli_fetch_array($query);
		$id_jadwal			= $r['id_jadwal'];
		$instasi			= $r['instasi_jadwal'];
		$target				= $r['target_jumlah_jadwal'];
		$tanggal_jadwal 	= $r['tanggal_jadwal'];
		$jam_jadwal 		= $r['jam_jadwal'];
		$hari_jadwal 		= $r['hari_jadwal'];
		$alamat_jadwal		= $r['alamat_jadwal'];
		$kecamatan_jadwal	= $r['kecamatan_jadwal'];
		$lat_peta_jadwal	= $r['lat_jadwal'];
		$lng_peta_jadwal 	= $r['lng_jadwal'];
		$link_peta_jadwal 	= $r['link_jadwal'];
		$opsihari  			= array('Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
		$opsikecamatan 		= array('Denpasar Timur' ,'Denpasar Selatan', 'Denpasar Barat', 'Denpasar Utara');
	}else{
		$id_jadwal			= '';
		$instasi			= '';
		$target				= '';
		$target_jumlah		= '';
		$tanggal_jadwal 	= '';
		$jam_jadwal 		= '';
		$lokasi_jadwal		= '';
		$kecamatan_jadwal	= '';
		$lat_peta_jadwal	= '';
		$lng_peta_jadwal 	= '';
		$link_peta_jadwal 	= '';
		echo'
		<script>
			$(document).ready(function () {
				$("#infoSalah").html("Data Yang Dipilih Salah!");
				$("#modalInfo").modal();
				$("#buttonKembali").show();
				$("#buttonOK").hide();
			});
		</script>';
	}
}
?>
<script>
	sembunyiform();
</script>
<div class="modal fade" id="modalInfo">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informasi</h4>
      </div>
      <div class="modal-body">
        <p id="infoSalah"></p>
      </div>
      <div id="buttonOK" class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">OK</button>
      </div>
	  <div id="buttonKembali" class="modal-footer">
        <a href="/PMIAdminPHP/admin/jadwal/"><button type="button" class="btn btn-default pull-left"><i class="fa fa-angle-left"></i>  Kembali</button></a>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="mapModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Pilih Lokasi</h4>
		<p class="modal-title">Mungkin Penggunaan Pengisian Alamat Otomtasi Kurang Akurasi, Isikan Manual Jika Alamat Yang Akan Diisi Berdasarkan Tempat Yang Tertentu</p>
      </div>
        <div class="modal-body" id='map-canvas'></div>
      <div id="buttonOK" class="modal-footer">
	  	<p id="infoAlamat" style="text-align:left;"></p>
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
<section class="content-header">
<h1>
Ubah
<small>Jadwal</small>
</h1>
<ol class="breadcrumb">
<li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li>Jadwal</li>
<li class="active">Ubah</li>
</ol>
</section>
<section class="content">
<div id="statusOK" class="callout callout-info">
	<h4>Berhasil!</h4>
	Tunggu Sebentar Akan Dikembalikan Ke Dashboard....
</div>
<div class="box">
	<div class="box-header">
	<h3 class="box-title">Ubah Jadwal</h3>
	</div>
<form method="post" enctype="multipart/form-data">
	<div class="box-body">
		  <div class="form-group">
			<label for="id_jadwal" class="control-label">ID Jadwal</label>
			<div>
			  <input type="text" class="form-control" disabled="disabled" value="<?php echo $id_jadwal; ?>" id="id_jadwal">
			  <input type="hidden" name="id_jadwal" value="<?php echo $id_jadwal;?>">
			</div>
		  </div>
		  		  <div class="form-group">
			<label for="target" class="control-label">Target Jumlah</label>
			<div>
			  <input type="number" class="form-control" value="<?php echo $target; ?>" id="target" name="target" onchange="cekKebenaran('ubah',1,'#target','Pastikan Anda Mengisi Jumlah Target.!')" onkeypress="return hanyaNomor(event)" required>
			</div>
		  </div>
		  <div class="form-group">
			<label for="instasi" class="control-label">Instasi</label>
			<div>
			  <input type="text" class="form-control" value="<?php echo $instasi; ?>" id="instasi" name="instasi" onchange="cekKebenaran('ubah',1,'#instasi','Pastikan Anda Mengisi Instasi.!')" required>
			</div>
		  </div>
		   <div class="form-group">
			<label for="tanggal_jadwal" class="control-label">Tanggal Jadwal</label>
			<div>
			  <input type="date" class="form-control" id="tanggal_jadwal" value="<?php echo $tanggal_jadwal;?>" name="tanggal_jadwal" required>
			</div>
		  </div>
		  <div class="form-group">
			<label for="jam_jadwal" class="control-label">Jam Jadwal</label>
			<div>
			  <input type="time" class="form-control" id="jam_jadwal" value="<?php echo $jam_jadwal;?>" name="jam_jadwal" required>
			</div>
		  </div>
		  <div class="form-group">
			<label for="hari_jadwal" class="control-label">Hari Jadwal</label>
			<div>
			  <select class="form-control" id="tanggal_jadwal" name="hari_jadwal" required>
            	<?php
				foreach($opsihari as $option){
    			    if($hari_jadwal == $option){
							echo "<option selected='selected' value='$option'>$option</option>" ;
						}else{
							echo "<option value='$option'>$option</option>" ;
						}
					}
				?>
            </select>
			</div>
		  </div>
		   <div class="form-group">
			<label for="kecamatan_jadwal" class="control-label">Kecamatan</label>
			<div>
			  <select class="form-control" id="kecamatan_jadwal" name="kecamatan_jadwal" required>
            	<?php
				foreach($opsikecamatan as $option){
    			    if($kecamatan_jadwal == $option){
							echo "<option selected='selected' value='$option'>$option</option>" ;
						}else{
							echo "<option value='$option'>$option</option>" ;
						}
					}
				?>
            </select>
			</div>
		  </div>
		   <div class="form-group">
			<label for="lokasi_jadwal" class="control-label">Alamat Jadwal</label>
			<div class="input-group input-group-sm">
			  <input type="text" class="form-control" value="<?php echo $alamat_jadwal; ?>" id="lokasi_jadwal" name="lokasi_jadwal" onchange="cekKebenaran('ubah',1,'#lokasi_jadwal','Pastikan Anda Mengisi Alamat.!')" required>
			  <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat" id="showMap">Cari Lokasi Otomatis</button>
               </span>
			</div>
		  </div>
		   <div class="form-group">
			<label for="lat_peta_jadwal" class="control-label">Lattidue Google Map</label>
			<div>
			  <input type="text" class="form-control" value="<?php echo $lat_peta_jadwal; ?>" id="lat_peta_jadwal" maxlength="10" name="lat_peta_jadwal" onchange="cekKebenaran('ubah',10,'#lat_peta_jadwal','Pastikan Panjang Lattidue Google Map 10 Baris Angka.!')" required>
			</div>
		  </div>
		   <div class="form-group">
			<label for="lng_peta_jadwal" class="control-label">Longtidue Google Map</label>
			<div>
			  <input type="text" class="form-control" value="<?php echo $lng_peta_jadwal; ?>" id="lng_peta_jadwal" maxlength="10" name="lng_peta_jadwal" onchange="cekKebenaran('ubah',10,'#lng_peta_jadwal','Pastikan Panjang Longtidue Google Map 10 Baris Angka.!')" required>
			</div>
		  </div>
		   <div class="form-group">
			<label for="link_peta_jadwal" class="control-label">Link Google Map</label>
			<div>
			  <input type="text" class="form-control" value="<?php echo $link_peta_jadwal; ?>" id="link_peta_jadwal" name="link_peta_jadwal" onchange="cekKebenaran('ubah',1,'#link_peta_jadwal','Pastikan Anda Mengisi Link.!')" required>
			</div>
		  </div>
		  <div class="form-group">
			<div>
			 <a href="<?php echo base_url();?>admin/jadwal/"><button type="button" class="btn btn-default"><i class="fa fa-angle-left"></i>  Kembali</button></a>
			  <button type="submit" name="submit" class="btn btn-danger"><i class="fa fa-save"></i> Ubah</button>
			</div>
		  </div>
	</div>
</form>
</div>
</section>

<?php
if (isset($_POST['submit'])){  
	$e_id_jadwal		= $_POST['id_jadwal'];
	$e_instasi			= $_POST['instasi'];
	$e_target			= $_POST['target'];
	$e_tanggal_jadwal 	= $_POST['tanggal_jadwal'];
	$e_jam_jadwal  		= $_POST['jam_jadwal'];
	$e_hari_jadwal  	= $_POST['hari_jadwal'];
	$e_kecamatan	  	= $_POST['kecamatan_jadwal'];
	$e_alamat_jadwal 	= $_POST['lokasi_jadwal'];
	$e_lat_peta_jadwal 	= $_POST['lat_peta_jadwal'];
	$e_lng_peta_jadwal 	= $_POST['lng_peta_jadwal'];
	$e_link_peta_jadwal = $_POST['link_peta_jadwal'];
	$q_edit	= 'UPDATE jadwal SET instasi_jadwal="'.$e_instasi.'", target_jumlah_jadwal="'.$e_target.'", tanggal_jadwal="'.$e_tanggal_jadwal.'", kecamatan_jadwal="'.$e_kecamatan.'", jam_jadwal="'.$e_jam_jadwal.'", hari_jadwal="'.$e_hari_jadwal.'", alamat_jadwal="'.$e_alamat_jadwal.'", lat_jadwal="'.$e_lat_peta_jadwal.'", lng_jadwal="'.$e_lng_peta_jadwal.'",link_jadwal="'.$e_link_peta_jadwal.'" WHERE id_jadwal="'.$e_id_jadwal.'"';
	$p_edit	= mysqli_query(koneksi_global(),$q_edit) or die(mysqli_error());
	if ($p_edit){
		echo '<script>
				$(document).ready(function(){
					$("#statusOK").show();
				});
				setTimeout(function(){window.location="'.base_url().'/admin/jadwal/";}, 1000);
			 </script>';
	}
}
?>