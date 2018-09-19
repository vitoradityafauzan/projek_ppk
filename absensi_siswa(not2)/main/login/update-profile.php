<?Php

include "include/session.php";
include "config.php";
$count=$dbo->prepare("select * from plus_signup where username=:username");
$count->bindParam(":username",$username,PDO::PARAM_STR);
$row = $count->fetch(PDO::FETCH_OBJ);


?>
<!doctype html public>

<html>

<head>
<title>Update Profile</title>

<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
</head>

<body >

	<div class="container">
		<div class="wrapper">
			<h1 class="display-1"> Update Profile</h1>

			<form name=todo method=post form action='update-profileck.php' onsubmit='return validate(this)'><input name="todo" type=hidden value=update-profile>

		<div class="form-group" style="width: 35%;">
			<label for="email">Email</label>
			<input type="text" name="email" class="bginput form-control" value="<?php echo $row['email']; ?>" required autofocus>
		</div>
		<div class="form-group" style="width: 35%;">
			<label for="nama">Nama</label>
			<input type="text" name="nama" class="bginput form-control" value="<?php echo $row['nama']; ?>" required>
		</div>
		<div class="form-group" style="width: 35%;">
			<label for="phone">Nomor Telepon</label>
			<input type="number" name="phone" class="bginput form-control" value="$row['phone'];" required>
		</div>

		<div class="form-group" style="width: 35%;">
			<label for="nama">Jabatan</label>
			<input type="text" name="division" class="bginput form-control" value="<?php echo $row['division']; ?>" required>
		</div>

			<button type="submit" class="btn btn-success">Update</button>
			<a href="../../index.php" class="btn btn-danger" role="button">Cancel</a>
		</div>
		
	</div>

<?Php
// check the login details of the user and stop execution if not logged in
require "check.php";

// If member has logged in then below script will be execuated. 
// let us collect all data of the member 
$count=$dbo->prepare("select * from plus_signup where username='$_SESSION[username]'");
if(!($count->execute())){
echo "Database Problem ";
exit;
}else{
$row = $count->fetch(PDO::FETCH_OBJ);
}


// One form with a hidden field is prepared with default values taken from field. 


echo "</table>";
?>

</body>
<script type="text/javascript" src="../../static/js/bootstrap.min.js"></script>

</html>