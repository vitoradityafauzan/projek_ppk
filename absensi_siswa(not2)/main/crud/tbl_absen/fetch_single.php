<?php
include('db.php');
include('function.php');
if(isset($_POST["id_absen"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_absen 
		WHERE id_absen = '".$_POST["id_absen"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["nis_siswa"] = $row["nis_siswa"];
		$output["nama_siswa"] = $row["nama_siswa"];
		$output["kelas_siswa"] = $row["kelas_siswa"];
		$output["tgl_absen"] = $row["tgl_absen"];
		$output["alasan_absen"] = $row["alasan_absen"];
	}
	echo json_encode($output);
}
?>