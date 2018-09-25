
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
							<th width="6%">NIS</th>
							<th width="25%">Nama</th>
							<th width="10%">Kelas</th>
							<!--<th width="10%">Keterangan</th>
							<th width="2.5%">Edit</th>-->
							<th width="9%">Aksi</th>
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
					<input type="text" name="nis_siswa" id="nis_siswa" class="form-control" autofocus>
					<br />

					<label>Nama siswa</label>
					<input type="text" name="nama_siswa" id="nama_siswa" class="form-control" autofocus>
					<br />

					<label for="kelas_siswa"> Kelas : </label>
							<select class="form-control" id="kelas_siswa" name="kelas_siswa" required>
								<option>X - RPL</option>
								<option>XI - RPL</option>
								<option>XII - RPL</option>
							</select>
					<br />

				</div>
				<div class="modal-footer">
					<input type="hidden" name="id_siswa" id="id_siswa" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>

<div id="userModal_absen" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form_absen" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title_absen">Absen Siswa</h4>
				</div>
				<div class="modal-body">
					<label>NIS</label>
					<input type="text" name="nis_siswa" id="nis_siswa" class="form-control" readonly="true" autofocus>
					<br />

					<label for="tgl_absen">Tanggal Absen(thn-bln-tgl)</label>
					<input type="date" name="tgl_absen" id="tgl_absen" class="form-control" required />
					<br />

					<label for="alasan_siswa">Keterangan</label>
					<select class="form-control" id="alasan_absen" name="alasan_absen" id="alasan_absen" required>
							<option>Alpha</option>
							<option>Izin</option>
							<option>Sakit</option>
						</select>

				</div>
				<div class="modal-footer">
					<input type="hidden" name="id_siswa" id="id_siswa" />
					<input type="hidden" name="operation2" id="operation2" value="absen"/>
					<input type="submit" name="action2" id="action2" class="btn btn-success" value="absen" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	$('#add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').text("Tambah Siswa");
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
				"targets":[0, 3],
				"orderable":false,
				"searchable": false,
			},
		],

	});

	// Insert Script-------------------

	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		var nama_siswa = $('#nama_siswa').val();
		var nis_siswa = $('#nis_sisw').val();
			
		if(nama_siswa != '' && nis_siswa != '')
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
			alert("Data Harap di Isi");
		}
	});

	// End Insert Script---------------
	
	// Script Edit---

	$(document).on('click', '.update', function(){
		var id_siswa = $(this).attr("id_siswa");
		$.ajax({
			url:"main/crud/fetch_single.php",
			method:"POST",
			data:{id_siswa:id_siswa},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				//$('#id_siswa').val(data.id_siswa);
				$('#nis_siswa').val(data.nis_siswa);
				$('#nama_siswa').val(data.nama_siswa);
				$('#kelas_siswa').val(data.kelas_siswa);
				$('.modal-title').text("Edit User");
				$('#id_siswa').val(id_siswa);
				
				$('#action').val("Update");
				$('#operation').val("Update");
			}
		})
	});

	// End Edit Script------

	// Absen Script-------------------

/*	$(document).on('submit', '#user_form_absen', function(event){
		event.preventDefault();
		var nama_siswa = $('#nama_siswa').val();
		var nis_siswa = $('#nis_absen').val();
			
		if(nama_siswa != '' && nis_siswa != '')
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
					$('#userModal_absen').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Harus di Isi !");
		}
	}); */

	$(document).on('click', '.absen', function(){
		var id_siswa = $(this).attr("id_siswa");
		$.ajax({
			url:"main/crud/fetch_single.php",
			method:"POST",
			data:{id_siswa:id_siswa},
			dataType:"json",
			success:function(data)
			{
				$('#userModal_absen').modal('show');
				$('#nis_siswa').val(data.nis_siswa);
				$('#nama_siswa').val(data.nama_siswa);
				$('#kelas_siswa').val(data.kelas_siswa);
				$('#tgl_absen').val(data.tgl_absen);
				$('#alasan_absen').val(data.alasan_absen);
				$('.modal-title').text("Absen Siswa");
				$('#id_siswa').val(id_siswa);
				
				$('#action2').val("absen");
				$('#operation2').val("absen");
			}
		})
	});
	

	// End Absen Script---------------

	// Delete Script------------------
	
	$(document).on('click', '.delete', function(){
		var id_siswa = $(this).attr("id_siswa");
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