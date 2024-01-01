<?php
  include "connect.php";
  session_start();
  if (!isset($_SESSION["Login"])){
    header("location: login.php");
  }
  $user=$_SESSION["Username"];
  $kuis=array();
  $nilai=array();
  // echo '<p>Halo '.$user.'</p>';
  $sql = "SELECT * FROM nilai ORDER BY nama_kuis ASC nama_kuis WHERE usernamemhs='".$user."'";
  $sql1 = "SELECT * FROM nilai WHERE usernamemhs='".$user."' and nama_kuis=";
  $sql2="SELECT * FROM nilai where usernamemhs='$user'";
  //echo $sql;
  $a=mysqli_query($con,$sql2);
  // $row=$a->fetch_assoc();
  // echo 'Nama: '.$row['nama'];
  while($row = mysqli_fetch_assoc($a)){ 
      array_push($kuis,$row['nama_kuis']);
      array_push($nilai,$row['nilai']);
  }
  $b=mysqli_query($con,$sql1);
  // $row=$a->fetch_assoc();
  // echo 'Nama: '.$row['nama'];
  // while($row = mysqli_fetch_array($print))
  //             {
  //               echo '<option value="'.$row["id"].'">'.$row["username"].'</option>';
  //             }
	echo '
	<!DOCTYPE html>
	<html>
	<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	</style>
	<title>Nilai</title>
	</head>
	<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  		<a class="navbar-brand" href="utama.php">E-Learn</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  			</button>

  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
    		<ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="nilaisiswa.php">Lihat Nilai</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Lihat Materi
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="materisiswa.php">Chapters</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ikutkuis.php">Ikuti Kuis</a>
            </li>
        </ul>
          <form class="form-inline my-2 my-lg-0" action="login.php">
            <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
          </form>
  		</div>
	</nav>
	<div class="container">
    <div class="jumbotron">
    <h1 align="center"> Nilai Kuis yang telah diselesaikan </h1>
    <form method="get" action="">
      <select name="pilihkuis" id="pilihkuis" class="form-control">
            <option value="">Pilih Kuis</option>';
            for($i=0;$i<sizeof($kuis);$i++)
            {
              echo '<option value="'.$kuis[$i].'">'.$kuis[$i].'</option>';
            }
           echo '
          </select>
          <button type="submit" name="search" id="search" class="btn btn-info">Lihat</button>
          </form>';
          if(isset($_GET["search"])){
           $pilihkuis=$_GET["pilihkuis"];
            echo $pilihkuis;
              $sql3="SELECT * FROM nilai where nama_kuis='$pilihkuis' and usernamemhs='$user'";
              $b=mysqli_query($con,$sql3);
                while($row = mysqli_fetch_assoc($b)){ 
                  $nilaiambil=$row['nilai'];
                }
                if($_GET["pilihkuis"]!=""){
                 echo'
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Kuis</th>
             <th scope="col">Nilai</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>';

            echo'
            <td>'.$pilihkuis.'</td>
            <td>'.$nilaiambil.'</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  </body>
</html>';
}
          }
           
//   <script>
//     function loadDoc() {
//       var xhttp = new XMLHttpRequest();
//         xhttp.onreadystatechange = function() {
//           if (this.readyState == 4 && this.status == 200) {
//             document.getElementById("demo").innerHTML =
//             this.responseText;
//           }
//         };
//       xhttp.open("GET", "nilaikuis.txt", true);
//       xhttp.send();
//     }
// </script>
?>