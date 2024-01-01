<?php
	include "connect.php"; 
	session_start();
    if (!isset($_SESSION["Login"])){
      header("location: login.php");
    }
    $user1=$_SESSION["Username"];
	$bab = $_POST['bab']; 
	$sql = "UPDATE detail_materi SET bab='$bab' where usernamedosen ='".$user1."'"; 
	$a=mysqli_query($con, $sql); 
	if($a)
	{ 
		echo "update success";
	}
	else
	{ 
		echo "Gagal";
	}

?>