<?php

include "include/session.php";
include "config.php";
require "check.php"

?>
<!doctype html public>

<html>

<head>
<title>Change Password</title>

<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
<meta name="GENERATOR" content="Arachnophilia 4.0">
<meta name="FORMATTER" content="Arachnophilia 4.0">
</head>

<body >
	<div class="container">
		<div class="wrapper">
			<h1 class="display-1">Ganti Password </h1>
			
			<form action="change-passwordck.php" method=post  
			onsubmit='return validate(this)' >
			<input type=hidden value=change-password name="todo" >

		<div class="form-group" style="width: 35%;">
			<label for="password">Password lama</label>
			<input type="password" name="old_password" class="bginput form-control" >
		</div>
		<div class="form-group" style="width: 35%;">
			<label for="password"> Password baru</label>
			<input type="password" name="password" class="bginput form-control" >
		</div>
		<div class="form-group" style="width: 35%;">
			<label for="password"> Masukan ulang password baru</label>
			<input type="password" name="password2" class="bginput form-control" >
		</div>
			
		<button type="submit" class="btn btn-success">Ganti Password</button>
		 <a href="../../index.php" class="btn btn-danger" role="button">Kembali</a>




	</div>
		</div>
</body>
<script type="text/javascript" src="../../assets/js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>

	
</html>
