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
  $id_detailquiz=array();
  $namakuis=array();
  $kuis="SELECT * from detail_quiz";
  $hasil=mysqli_query($con,$kuis);
  //$jumlaharr=array();
  while($row = mysqli_fetch_assoc($hasil))
  {
  	array_push($id_detailquiz,$row['id']);
  	array_push($namakuis,$row['namaquiz']);
  //	array_push($jumlaharr,$row['jumlah']);
  }
 echo '
 <!DOCTYPE html>
 <html>
 <head>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 </style>
 <title>QUIZ</title>
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

       
          <form class="form-inline my-2 my-lg-0" action="logout.php">
            <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
          </form>
    </div>
 </nav>
 <div class="container">
    <div class="jumbotron">
    <h1>Halo '.$nama.'</h1>
    <form action="" method="POST">
    <select name="ikutkuis" class="form-control">';
    for($i=0;$i<sizeof($namakuis);$i++)
    {
    	echo '<option value="'.$id_detailquiz[$i].'">'.$namakuis[$i].'</option>';
    }
    echo '
    </select>
    <br>
    <center>
     <button name="ok" class="btn btn-success my-2 my-sm-0" type="submit">Submit</button>
     </center>
    </form>
    ';
    if(isset($_POST["ok"]))
    {
    	$pilihquiz=$_POST["ikutkuis"];
    	$_SESSION["Pilihquiz"]=$pilihquiz;
    	$sqlquiz="SELECT * from quiz where id_detailquiz='$pilihquiz'";
    	$tampil=mysqli_query($con,$sqlquiz);
    	$jumlah;
    	$cekikutquiz="SELECT * from nilai where usernamemhs='$user' and id_detailquiz='$pilihquiz'";
    	$cekquiz=mysqli_query($con,$cekikutquiz);
    	$cek_quiz="";
    	while($row=mysqli_fetch_assoc($cekquiz))
    	{
    		$cek_quiz=$row['id_detailquiz'];
    	}
    	echo $cek_quiz;
    	$soal=array();
    	while($row=mysqli_fetch_assoc($tampil))
    	{	
    		array_push($soal,$row['isiquiz']);
    	}
    	$sqlambilnamaquiz="SELECT * from detail_quiz where id='$pilihquiz'";
  		$res=mysqli_query($con,$sqlambilnamaquiz);
  		$namaquiz='';
  		while($row=mysqli_fetch_assoc($res))
  		{
  			$namaquiz=$row['namaquiz'];
  		}
  		if($cek_quiz==$pilihquiz){
  			echo '<script>alert("Sudah ikut quiz")</script>';
  			header("location:ikutkuis.php");
  		}
  		else{
    	$jumlahsoal=sizeof($soal);
    	$_SESSION["Jumlah"]=$jumlahsoal;
    	echo '<form method="post" action="proseskuis.php">';
    	echo '<center><h4>Quiz '.$namaquiz.'</h4></center>';
    	for($i=0;$i<$jumlahsoal;$i++)
    	{
    		echo $i+1;
    		echo '. <br><label>'.$soal[$i].'</label><br>';
    		echo '<input type="radio" name="jawaban'.$i.'" value="benar"> Benar <br>';
			echo '<input type="radio" name="jawaban'.$i.'" value="salah"> Salah<br>';
    	}
    }

    }
    echo'
    <br>
   	<button class= "btn btn-success" type="submit" name="submit">Submit Quiz</button>
    </form>
    </div>
  </div>
</body>
</html>';
?>