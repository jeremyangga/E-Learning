<?php
include "connect.php";
session_start();
if(!isset($_SESSION["Login"])){
  header("location: login.php");
}
// if(	isset($_POST['signup']))
// {	
// 	$username=$_POST['username'];
// 	$nama=$_POST['nama'];
// 	// $password=$_POST['password'];
// 	$password="elearndosen";
// 	$nilai=0;
// 	echo 'username : '.$username.'<br>nama: '.$nama;
// 	$sqlcekdosen="Select * from dosen where username='$username'";
// 	$cekdosen=mysqli_query($con,$sqlcekdosen);
// 	if(mysqli_num_rows($cekdosen)>0){
// 		echo('<script type="text/javascript">alert("Gagal input, Username sudah diambil");</script>');
// 		header("Refresh:0");
// 	}
// 	else{
// 		// $sql="Insert into dosen value ('$username','$nama','$password')";
// 		// $a=mysqli_query($con,$sql);
// 		// header("Location:homeadmin.php");
// 		echo'
		
// ';
// 	}
?>

<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
		<title>Home</title>
		</head>
	<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  		<a class="navbar-brand" href="homeadmin.php">E-Learn</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  			</button>

  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
    		<ul class="navbar-nav mr-auto">
    		</ul>
          <li class="nav-item dropdown">
              <label style="color:white;"class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Profile
              </label>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="editpassnmahasiswa.php">Ganti password</a>           
                </div>
            </li>
          <form class="form-inline my-2 my-lg-0" action="login.php">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
          </form>
  		</div>
	</nav>
		<div class="jumbotron">
  			<center><h1 class="display-4">Sign Up Dosen</h1></center>
  			<form method="post" action="" name="signup-form">
	    		<div class="form-element">
	    			<center>
	        			<label>Username</label><br>
	        			<input type="text" id="username" name="username" pattern="[a-zA-Z0-9]+" required />
	    			</center>
	    		</div>
	    		<div class="form-element">
	        		<center>
	        			<label>Nama Lengkap</label><br>
	        			<input type="text" id="nama" name="nama" required />
	    			</center>
	    		</div>
	    	<!-- 	<div class="form-element">
	        		<center>
	        			<label>Password</label><br>
	        			<input type="password" name="password" required />
	    			</center>
	    		</div> -->
	    		<hr class="my-4">
	    		<center> <button input id="add" class="btn btn-primary btn-lg" type="submit" name="signup"> Sign Up</button></center>
  			</form>
		</div>
	</body>
	</html>
	<script>
  	$(document).ready(function()
  	{
    	$("#add").click(function()
    	{
     	 	var username= $("#username").val();
      		var nama= $("#nama").val();
        	$.ajax({
          	url:"insertdosen.php",
          	method:"POST",
          	data: "username=" + username+ "&nama=" + nama,
          	// dataType:"JSON",
          	success:function(data)
          	{
            	alert("Data berhasil ditambah");
          	}
        })
    	});
  	});
	</script>';