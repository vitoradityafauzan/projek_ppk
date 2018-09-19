<?php
include('db.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_absen ";


if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE nis_siswa LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR nama_siswa LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR kelas_siswa LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR tgl_absen LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR alasan_absen LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY nis_siswa ASC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	
	$sub_array = array();
	$sub_array[] = $row["nis_siswa"];
	$sub_array[] = $row["nama_siswa"];
	$sub_array[] = $row["kelas_siswa"];
	$sub_array[] = $row["tgl_absen"];
	$sub_array[] = $row["alasan_absen"];
	$sub_array[] = '<button type="button" name="delete" id_siswa="'.$row["id_siswa"].'" class="btn btn-danger btn-xs delete">Delete</button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>