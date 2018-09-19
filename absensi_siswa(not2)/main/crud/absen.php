<?php
include('db.php');
include('function.php');
if(isset($_POST["operation2"]))
{
	if($_POST["operation2"] == "Tambah")
	{
		
		$statement = $connection->prepare("
			INSERT INTO tbl_absen (tgl_absen, alasan_absen) 
			VALUES (:tgl_absen, :alasan_absen)
			WHERE id_siswa = :id_siswa
		");
		$result = $statement->execute(
			array(
				':tgl_absen'	=>	$_POST["tgl_absen"],
				':alasan_absen'	=>	$_POST["alasan_absen"],
				':id_siswa'	=>	$_POST["id_siswa"]
			)
		);
		if(!empty($result))
		{
			echo 'Data berhasil di Input!';
		}
	}
	


?>