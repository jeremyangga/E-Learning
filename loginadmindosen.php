<?php
	session_start();
    include "connect.php";
	if( isset($_POST['login']))
	{
		$user=$_POST['username'];
        $pass=$_POST['password'];
        if($user=='admin')
        {
            $sqladmin="select * from admin where password='$pass'";
            $cekadmin=mysqli_query($con,$sqladmin);
            if(mysqli_num_rows($cekadmin)>0){
                echo "hello admin";
                $_SESSION["Login"] = true;
                $_SESSION["Username"]=$user;
                header("location: homeadmin.php");
            }
            else{
                echo "<script>alert('Admin salah password')";
                header("Refresh:0");
            }
        }
        else
        {
        	$sqldosen="select * from dosen where username='$user' and password='$pass'";
        	$cekdosen=mysqli_query($con,$sqldosen);
        	if(mysqli_num_rows($cekdosen)>0){
        		$_SESSION["Login"] = true;
        		$_SESSION["Username"]=$user;
        		header("location: homedosen.php");
        	}
        	else{
        		echo "<script>alert('Salah password atau username')</script>";
        	}
        }
		// echo 'user : '.$user.'<br>Pass: '.$pass;
		// $sql="select * from mahasiswa where username='".$user."'and password = '".$pass."'";
		// $a=mysqli_query($con,$sql);
		// if(mysqli_num_rows($a)>0){
		// 	echo "Sukses login";
		// 	header("location:utama.php");
		// }
		// else
		// {
		// 	echo "Gagal login, cek password dan username";
		// 	header("Refresh:0");
		// }

	}
?>
<html>
	<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
	</head>
	<body>
	<div class="container">
		<div class="jumbotron" align="center">
			<h1 style="center;">Login Admin dan Dosen</h1>
			<form method="post" action="">
				username<br>
  				<input type="text" name="username"><br>
  				password<br>
  				<input type="password" name="password"><br><br>
  				<button class="btn btn-primary btn-lg" type="submit" name="login">Login</button>
  			</form>
	</div>
	</body>
	</html>