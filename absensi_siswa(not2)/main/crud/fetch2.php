<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "crud");
$columns = array('nis_siswa, nama_siswa, kelas_siswa');

$query = "SELECT * FROM tbl_siswa WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'tanggal BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (nis_siswa LIKE "%'.$_POST["search"]["value"].'%" 
  OR nama_siswa LIKE "%'.$_POST["search"]["value"].'%" 
  OR kelas_siswa LIKE "%'.$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY id_siswa DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
	$sub_array[] = $row["nis_siswa"];
	$sub_array[] = $row["nama_siswa"];
	$sub_array[] = $row["kelas_siswa"];
	$sub_array[] = '<button type="button" name="update" id_siswa="'.$row["id_siswa"].'" class="btn btn-warning btn-xs update">Update</button> <button type="button" name="delete" id_siswa="'.$row["id_siswa"].'" class="btn btn-danger btn-xs delete">Delete</button> <button type="button" name="absen" id_siswa="'.$row["id_siswa"].'" class="btn btn-danger btn-xs absen">absen</button>';
  /*	$sub_array[] = '<button type="button" name="absen" id_siswa="'.$row["id_siswa"].'" class="btn btn-info btn-xs absen">Absen</button>'; */
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM tbl_siswa";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>