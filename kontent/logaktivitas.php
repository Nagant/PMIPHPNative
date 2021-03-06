<div class="modal fade" id="modalInfo">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="infoJudul"></h4>
      </div>
      <div class="modal-body">
        <p id="infoSalah"></p>
      </div>
      <div id="statusHapus" class="modal-footer">
		<button id="statusHapus" type="button" tabel="pendonor" col="id_pendonor" class="btn btn-danger delete_class"><i class="fa fa-trash"></i> Hapus</button>
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
      </div>
	  <div id="statusOK" class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

<div id="form_tabel">
	<section class="content-header">
		<h1>
			Log Aktivitas
		</h1>
		<ol class="breadcrumb">
			<li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li class="active">Log Aktivitas</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Data Log Aktivitas</h3>
						<div class="box-tools">
							<div class="input-group input-group-sm">

							</div>
						</div>
					</div>
					<div class="box-body">
						<form id="formlog" class="form-inline" method="POST">
							<div class="form-group">
								<label> Cari Berdasarkan : </label>
								<select id="type_pencarian" name="type_pencarian" class="form-control" required>
									<option value=''>Pilih</option>
									<option value='semua'>Semua</option>
									<option value='tanggal'>Berdasarkan Tanggal</option>
								</select>
							</div>
							<div id="tanggal1" class="form-group">
								<label> Ambil Dari Tanggal : </label>
								<input type="date" id="bulandari" name="bulandari" class="form-control" required>
							</div>
							<div id="tanggal2" class="form-group">
								<label> Ke Tanggal : </label>
								<input type="date" id="bulanke" name="bulanke" class="form-control" required>
							</div>
							<button type="submit" class="btn btn-default"><i class="fa fa-eye"></i> Lihat</button>
						</form>
						<br/>
						<div id="log_aktivitas"></div>
					</div>
				</div>
			</div>
	</section>
</div>
<script>
	$(document).ready(function () {
		$("#tanggal1").hide();
		$("#tanggal2").hide();
	})

	$("#type_pencarian").change(function(){
		if($(this).val() == "semua" || $(this).val() == ""){
			$("#tanggal1").hide();
			$("#tanggal2").hide();
			$('#bulandari').prop('required',false);
			$('#bulanke').prop('required',false);
		}else{
			$("#tanggal1").show();
			$("#tanggal2").show();
			$('#bulandari').prop('required',true);
			$('#bulanke').prop('required',true);
		}
	})
</script>