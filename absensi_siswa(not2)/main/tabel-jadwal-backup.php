
	<body>
		<div class="container box" style="width: 100%; margin-top: -10px;">
			<h1 align="center">PROFIL SISWA</h1>
			<br />
			<div class="table-responsive">
				<br />
				<div align="right">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Tambah</button>
				</div>

				<br /><br />

				<table id="user_data" class="table table-bordered table-striped" style="width: 100%;">
					<thead>
						<tr>
							<th width="5%">NIS</th>
							<th width="25%">Nama</th>
							<th width="10%">Kelas</th>
							<th width="2.5%">Edit</th>
							<th width="2.5%">Delete</th>
							<th width="2.5%">Absen</th>
						</tr>
					</thead>
				</table>
				
			</div>
		</div>
	</body>
</html>

<div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Tambah data</h4>
				</div>
				<div class="modal-body">
					<label>NIS</label>
					<input type="text" name="id_siswa" id="id_siswa" class="form-control" autofocus>
					<br />

					<label>Nama siswa</label>
					<input type="text" name="nama_siswa" id="nama_siswa" class="form-control" autofocus>
					<br />

					<label for="sel1"> Kelas : </label>
							<select class="form-control" id="kelas_siswa" name="kelas_siswa" id="sel1" required>
								<option>X - RPL</option>
								<option>XI - RPL</option>
								<option>XII - RPL</option>
							</select>
					<br />

				</div>
				<div class="modal-footer">
					<input type="hidden" name="id_job" id="id_job" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- 
<div id="userModalAbsen" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form_absen" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title2">Absen Siswa</h4>
				</div>
				<label for="tgl_absen">Tanggal Absen(thn-bln-tgl)</label>
					<input type="text" name="tgl_absen" id="tgl_absen" class="form-control" value="<?php 
					$d=strtotime("today");
					echo date("Y-m-d", $d); 
					?>" readonly="true" required />
					<br />

					<label for="alasan_siswa">Keterangan</label>
					<select class="form-control" id="kelas_siswa" name="alasan_absen" id="alasan_absen" required>
							<option>Alpha</option>
							<option>Izin</option>
							<option>Sakit</option>
						</select>
					<!--<input type="text" name="alasan_absen" id="alasan_absen" class="form-control" required />
					<br />

				</div>
				<div class="modal-footer">
					<input type="hidden" name="id_job" id="id_job" />
					<input type="submit2" name="action2" id="action2" class="btn btn-success2" value="Tambah" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>-->

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	$('#add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').text("Add User");
		$('#action').val("Add");
		$('#operation').val("Add");
		
	});
	
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"main/crud/fetch.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 1, 3, 4, 5],
				"orderable":false,
				"searchable": false,
			},
		],

	});

	// Insert Script-------------------

	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		var nama_siswa = $('#nama_siswa').val();
		var tanggal = $('#tgl_absen').val();
			
		if(nama_siswa != '' && tgl_absen != '')
		{
			$.ajax({
				url:"main/crud/insert.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#user_form')[0].reset();
					$('#userModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Both Fields are Required");
		}
	});

	// End Insert Script---------------

	// Absen Script-------------------
	/*
	$(document).on('submit2', '#user_form_absen', function(event){
		event.preventDefault();
		var tanggal = $('#tgl_absen').val();
			
		if(nama_siswa != '' && tgl_absen != '')
		{
			$.ajax({
				url:"main/crud/absen.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#user_form_absen')[0].reset();
					$('#userModalAbsen').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Both Fields are Required");
		}
	});

	// End Absen Script---------------
	*/
	// Script Edit---

	$(document).on('click', '.update', function(){
		var id_job = $(this).attr("id_job");
		$.ajax({
			url:"main/crud/fetch_single.php",
			method:"POST",
			data:{id_siswa:id_siswa},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#id_siswa').val(data.id_siswa);
				$('#nama_siswa').val(data.nama_siswa);
				$('#kelas_siswa').val(data.kelas_siswa);
				$('.modal-title').text("Edit User");
				//$('#id_job').val(id_job);
				
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});

	// End Edit Script------

	// Delete Script------------------
	
	$(document).on('click', '.delete', function(){
		var id_job = $(this).attr("id_job");
		if(confirm("Are you sure you want to delete this?"))
		{
		// 	alert("HAPUS");
			$.ajax({
				url:"main/crud/delete.php",
				method:"POST",
				data:{id_siswa:id_siswa},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;	
		}
	});

	// End Delete Script---------------
	
	
});
</script>