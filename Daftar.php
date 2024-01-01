<?php
session_start();
if (!isset($_SESSION["Login"])){
  header("location: loginadmindosen.php");
}
include "connect.php";

if(	isset($_POST['signup']))
{	
	$username=$_POST['username'];
	$nama=$_POST['nama'];
	$password=$_POST['password'];
	$nilai=0;
	echo 'username : '.$username.'<br>nama: '.$nama;
	$sqlcekmhs="Select * from mahasiswa where username='$username'";
	$cekmhs=mysqli_query($con,$sqlcekmhs);
	if(mysqli_num_rows($cekmhs)>0){
		echo('<script type="text/javascript">alert("Gagal input, Username sudah diambil");</script>');
		header("Refresh:0");
	}
	else{
		$sql="Insert into mahasiswa value ('$username','$nama','$password',$nilai)";
		$a=mysqli_query($con,$sql);
		header("Location:login.php");
	}
}
?>

<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="jumbotron">
  			<center><h1 class="display-4">Sign Up</h1></center>
  			<form method="post" action="" name="signup-form">
	    		<div class="form-element">
	    			<center>
	        			<label>Username</label><br>
	        			<input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
	    			</center>
	    		</div>
	    		<div class="form-element">
	        		<center>
	        			<label>Nama Lengkap</label><br>
	        			<input type="text" name="nama" required />
	    			</center>
	    		</div>
	    		<div class="form-element">
	        		<center>
	        			<label>Password</label><br>
	        			<input type="password" name="password" required />
	    			</center>
	    		</div>
	    		<hr class="my-4">
	    		<center> <button input class="btn btn-primary btn-lg" type="submit" name="signup"> Sign Up</button></center>
  			</form>
		</div>
	</body>
	</html>