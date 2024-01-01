<?php
session_start();
include "connect.php";
if(!isset($_SESSION["Login"])){
	header("location: loginadmindosen.php");
}
$username=$_SESSION["Username"];
echo '
	<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<title></title>
		<style>
			#formItem label {
    			display: block;
    			text-align: center;
			}
		</style>
		<title>Add Quiz</title>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  		<a class="navbar-brand" href="homedosen.php">E-Learn</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  			</button>

  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
    		<ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Cari Mahasiswa
              </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="carimhsdosenall.php">Cari semua</a>
                    <a class="dropdown-item" href="#">Cari yang terdaftar</a>              
                </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Quiz
              </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="quiz.php">Add Quiz</a>
                    <a class="dropdown-item" href="Daftardosen.php">Daftar Dosen</a>              
                </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Materi
              </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="addbab.php">Add Bab</a>
                    <a class="dropdown-item" href="Daftardosen.php">Edit & Delete </a>              
                </div>
            </li>
    		</ul>
          <form class="form-inline my-2 my-lg-0" action="logout.php">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
          </form>
  		</div>
	</nav>
		<form method="post" action="">
			<div class="jumbotron jumbotron-fluid">
				<div class="container">
				<center>
				<h1 align="center">Quiz Setup</h1>
					<label for="quizname">Quiz Name</label>
						<br>
						<input type="text" name="quizname" aria-describedby="emailHelp" rows="10">
						<small id="emailHelp" class="form-text text-muted">Please input name of the Quiz</small>
						<a>How Many Question: </a><br>
      						<label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
      						<input type="text" name="jumlahquiz" aria-describedby="emailHelp"><br><br>
      					<button type="submit" name="tambahsoal" class="btn btn-primary">Submit</button>
				</center>
			</div>
		</div>
		</form>	
	</body>
	</html>';
	if (isset($_POST['tambahsoal']))
	{
		echo '<h1 style="text-align:center">Halo '.$username.' </h1>';
		$nama=$_POST['quizname'];
		$jumlah=(int)$_POST['jumlahquiz'];
		$sql= "Insert into detail_quiz value (NULL,'$nama',$jumlah,'$username')";
		$a=mysqli_query($con,$sql);
		echo '<p>Nama Quiz:'.$nama.'</p>';
		echo '<form method="POST" action="addquiz.php">';
		for($i=1;$i<=$jumlah;$i++)
		{
			echo '<p>Nomor '.$i.'</p>';
			echo '<textarea name="isiquiz'.$i.'" cols="100"></textarea><br>';
			echo '<input type="radio" name="jawaban'.$i.'" value="benar">Benar <br>';
			echo '<input type="radio" name="jawaban'.$i.'" value="salah">Salah';
		}
		echo '<br><button type="submit" name="tambahquiz" class="btn btn-primary">Tambah Quiz</button></form>';

	}
?>