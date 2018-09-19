<?php
	include "config.php";
	
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$division = $_POST['division'];
	$sql=$dbo->prepare("update plus_signup set nama=:nama,email=:email,phone=:phone,division=:division where username='$_SESSION[username]'");
	$sql->bindParam(':nama',$nama,PDO::PARAM_STR, 25);
	$sql->bindParam(':email',$email,PDO::PARAM_STR, 15);
	$sql->bindParam(':phone',$phone,PDO::PARAM_STR, 25);
	$sql->bindParam(':division',$division,PDO::PARAM_STR, 50);
	if($sql->execute()){
	echo " <script> alert('You have successfully updated your profile'); window.location.href='../../index.php'</script>";
	}// End of if profile is ok 
	else{
	print_r($sql->errorInfo()); // if any error is there it will be posted
	$msg="<font face='Verdana' size='2' color='red'>There is some problem in updating your profile<br></font>";
	}// end of if else if database updation failed
	}// end of if else for satus<> ok
	echo $msg;
	}// end of todo to check form inputs


?>