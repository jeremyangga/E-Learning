<?php
session_start();
if (!isset($_SESSION["Login"])){
  header("location: loginadmindosen.php");
}
?>

<!DOCTYPE html>
	<html>
	<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
	</head>
	<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  		<a class="navbar-brand" href="#">E-Learn</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  			</button>

  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
    		<ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Cari Mahasiswa dan Dosen
              </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="carimhsdosenall.php">Cari semua</a>
                    <a class="dropdown-item" href="adminviewmhs.php">Cari Mahasiswa</a>
                    <a class="dropdown-item" href="adminview2.php">Cari Dosen</a>              
                </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Add Data
              </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="Daftarmhs.php">Daftar Mahasiswa</a>
                    <a class="dropdown-item" href="Daftardosen.php">Daftar Dosen</a>              
                </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Hapus Data
              </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="deletelistmhs.php">Hapus Mahasiswa</a>
                    <a class="dropdown-item" href="deletelistdosen.php">Hapus Dosen</a>              
                </div>
            </li>
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
	<div class="container">
    <div class="col-sm">
    <center>
      <h1>Halo admin</h1>
      <a href="#">Pengertian dan Contoh Singkat Paragraf Narasi</a>
    </center>
    </div> 
  </div>
</body>
</html>