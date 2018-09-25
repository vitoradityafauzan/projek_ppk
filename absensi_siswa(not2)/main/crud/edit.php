<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	
	if($_POST["operation"] == "Update")
	{
		
		$statement = $connection->prepare(
			"UPDATE tbl_siswa
			SET nis_siswa = :nis_siswa, nama_siswa = :nama_siswa, kelas_siswa = :kelas_siswa  
			WHERE id_siswa = :id_siswa
			"
		);
		$result = $statement->execute(
			array(
				':nis_siswa'	=>	$_POST["nis_siswa"],
				':nama_siswa'	=>	$_POST["nama_siswa"],
				':kelas_siswa'	=>	$_POST["kelas_siswa"],
				':id_siswa'		=>	$_POST["id_siswa"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}

	
	/*if($_POST["operation"] == "Absen")
	{
		
		$statement = $connection->prepare(
			"INSERT INTO tbl_absen
			SET nis_siswa = :nis_siswa, nama_siswa = :nama_siswa, kelas_siswa = :kelas_siswa, tgl_absen = :tgl_absen, alasan_absen : alasan_absen
			"
		);
		$result = $statement->execute(
			array(
				':nis_siswa'	=>	$_POST["nis_siswa"],
				':nama_siswa'	=>	$_POST["nama_siswa"],
				':kelas_siswa'	=>	$_POST["kelas_siswa"],
				':tgl_absen'	=>	$_POST["tgl_absen"],
				':alasan_absen'	=>	$_POST["alasan_absen"],
				':id_siswa'		=>	$_POST["id_siswa"]
			)
		);
		if(!empty($result))
		{
			echo 'Absen Added';
		}
	} */
}

?>