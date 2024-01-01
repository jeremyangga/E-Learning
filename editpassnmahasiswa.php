<?php
	session_start();
	include "connect.php";
	if(!isset($_SESSION["Login"])){
		header("location: login.php");
	}
	$username=$_SESSION["Username"];
	$ambilpasslama;
	$ambilpass="SELECT * from mahasiswa where username='$username'";
	$res=mysqli_query($con,$ambilpass);
	while($row=mysqli_fetch_assoc($res))
	{
		$ambilpasslama=$row['password'];
	}
	if(isset($_POST["ganti"]))
	{
		$passlama=$_POST["passlama"];
		if($passlama!=$ambilpasslama)
		{
			echo '<script>alert("Password lama tidak sama")</script>';
		}
		else
		{
			$passbaru=$_POST["passbaru"];
			$confirm=$_POST["confirmpass"];
			if($passbaru!=$confirm)
			{
				echo '<script>alert("Password tidak sama")</script>';
			}
			else
			{
				$db="UPDATE mahasiswa SET password='$passbaru' where username='$username'";
				$proses=mysqli_query($con,$db);
				if($proses)
				{
					echo '<script>alert("Berhasil diganti")</script>';
					header("location:utama.php");
				}
				else
				{
					echo '<script>alert("Gagal diganti")</script>';
				}
			}
		}
	}

	
?>
<html>
	<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Password</title>
	</head>
	<body>
	<div class="container">
		<div class="jumbotron" align="center">
			<form method="post" action="">
				Password lama <br>
  				<input type="password" name="passlama"><br>
  				Password baru<br>
  				<input type="password" name="passbaru"><br>
  				Confirm password<br>
  				<input type="password" name="confirmpass"><br><br>
  				<button class="btn btn-primary btn-lg" type="submit" name="ganti">Ganti Password</button>
  			</form>
	</div>
	</body>
	</html>