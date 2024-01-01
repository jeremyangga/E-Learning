<?php
  include "connect.php";
    session_start();
    if (!isset($_SESSION["Login"])){
      header("location: login.php");
    }
?>
<!DOCTYPE html>
 <html>
 <head>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <a class="dropdown-item" href="Daftarmhs.php">Add Quiz</a>
                    <a class="dropdown-item" href="editquiz.php">Edit dan Hapus Quiz</a>              
                </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Materi
              </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="addbab.php">Add Bab</a>
                    <a class="dropdown-item" href="editbab.php">Edit Materi</a>
                    <a class="dropdown-item" href="deletebab.php">Hapus Materi</a>              
                </div>
            </li>
      </ul>
          <form class="form-inline my-2 my-lg-0" action="login.php">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
          </form>
    </div>
 </nav>
 <div class="container">
  <div class="jumbotron" align="center">
   <h1 style="center;">Add Bab</h1>
   <form method="POST" action="">
    Nama bab<br>
      <input type="text" name="namabab"><br><br>
      <button class="btn btn-primary btn-lg" type="submit" name="addbab" id="addbab">Add Bab</button>'
     </form> 
    </div>
   </div>
   <br>
   <div id="tambahmateri"></div>
</body>
</html>

 <script>
   // $(document).ready(function(){
   //  $("#addbab").on("click",function(){
   //   // e.preventDefault();
   //   // e.stopPropagation();
   //   var namabab = $('#namabab').val();
   //   // var dataBab = 'namabab='+namabab;
   //   $.ajax({
   //    method:"post",
   //    url:"addmateri.php",
   //    data: "namabab=" + namabab,
   //    success:function(result){
   //     // $("#tambahmateri").html(result);
   //     // $("#addbab").attr("disabled",true);
   //     alert("input sukses");
   //    }
   //   })
   //  })
   // })
   // function addMateri(){
   //  var bab=document.getElementById('namabab').value;
   //  //alert(bab);
   //  var dataBab="namabab="+bab;
   //  $.ajax({
   //   type:"post",
   //   url:"addmateri.php",
   //   data:dataBab,
   //   success: function(html){
   //    $('#tambahmateri').html(html);
   //   }
   //  });
   //  return false;
   //}
 </script>

<?php
//session_start();
include "connect.php";
  $user=$_SESSION["Username"];
  
// echo '<script> alert('.$namabab.') </script>';
//  echo '<h1 style="text-align:center">Nama bab: '.$addbab.'</h1>';
//   echo '<center><br><form method="post" action =""><textarea name="isimateri"></textarea><br><br>
//   <button class="btn btn-primary btn-lg" type="submit" name="addmateri">Add Materi</button></form></center>
//   ';
  if(isset($_POST['addbab']))
  {
    $namabab=$_POST['namabab'];
    $_SESSION["NamaBab"]=$namabab;
    echo $namabab.'<br>';
    $sql= "INSERT INTO detail_materi VALUES (NULL, '$namabab','$user')";
    $a = mysqli_query($con,$sql);
    //$_SESSION["IdDetailMateri"]=$idbab;
    echo '
    <form method="POST" action="addisimateri.php">
      Isi materi
      <textarea name="isimateri"></textarea>
      <button class="btn btn-primary" type="submit" name="ok">Submit</button>
    </form>
    ';
  }
?>
