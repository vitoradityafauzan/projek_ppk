<?php

include('db.php');
include("function.php");

if(isset($_POST["id_siswa"]))
{
	
	$statement = $connection->prepare(
		"DELETE FROM tbl_absen WHERE id_siswa = :id_siswa"
	);
	$result = $statement->execute(
		array(
			':id_siswa'	=>	$_POST["id_siswa"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>