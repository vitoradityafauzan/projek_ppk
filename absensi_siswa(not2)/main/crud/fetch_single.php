<?php
include('db.php');
include('function.php');
if(isset($_POST["id_siswa"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_absen 
		WHERE id_siswa = '".$_POST["id_siswa"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["nis_siswa"] = $row["nis_siswa"];
		$output["nama_siswa"] = $row["nama_siswa"];
		$output["kelas_siswa"] = $row["kelas_siswa"];
	}
	echo json_encode($output);
}
?>