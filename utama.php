<?php
  session_start();
  include "connect.php";
  if (!isset($_SESSION["Login"])){
  header("location: login.php");
  }
  $user=$_SESSION["Username"];
  $nama="";
  // echo '<p>Halo '.$user.'</p>';
  $sql = "SELECT * FROM mahasiswa WHERE username='".$user."'";
  //echo $sql;
  $a=mysqli_query($con,$sql);
  // $row=$a->fetch_assoc();
  // echo 'Nama: '.$row['nama'];
  while($row = mysqli_fetch_assoc($a)){ 
       $nama=$row['nama'];
  }
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
 <title>Home</title>
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
              <a class="nav-link" href="lihatnilai.php">Lihat Nilai</a>
            </li>
           <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Lihat Materi
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="viewmateri.php">Chapters</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ikutkuis.php">Ikuti Kuis</a>
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
       
          <form class="form-inline my-2 my-lg-0" action="logout.php">
            <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
          </form>
    </div>
 </nav>
 <div class="container">
    <div class="jumbotron">
    <h1>Halo '.$nama.'</h1>
      <div class="card" style="width: 15rem;">
        <div class="card-header">
          <h1>Chapters</h1>
        // </div>
        //     <ul class="list-group list-group-flush">
        //       <li class="list-group-item"><button type="button" class="btn btn-light">Bab 1</button></li>
        //       <li class="list-group-item"><button type="button" class="btn btn-light">Bab 2</button></li>
        //       <li class="list-group-item"><button type="button" class="btn btn-light">Bab 3</button></li>
        //     </ul>
        // </div>
      </div>
    </div>
  </div>
</body>
</html>'

?>