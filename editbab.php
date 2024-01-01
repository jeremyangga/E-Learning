<?php
  include "connect.php";
    session_start();
    if (!isset($_SESSION["Login"])){
      header("location: login.php");
    }
    $user1=$_SESSION["Username"];
    $sql = "SELECT * FROM detail_materi WHERE usernamedosen='".$user1."'";
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
   <h3 align="center">Edit Meteri</h3><br />   
      <form action="editbab1.php" method="POST">
        <center>
        <div class="row showdata">
          <?php 
            $host = "localhost";
            $user = "root";
            $pass = "";
            $database = "elearning";
            $con = mysqli_connect($host, $user, $pass, $database);

          $sql = "SELECT * FROM detail_materi WHERE usernamedosen='".$user1."'";
          $idaarr=array();
          $namaarr=array();
          $res = mysqli_query($con, $sql);
         // echo '<select id="pilih" class="form-control mt-3 mb-4" style="width: 200px;">';
          while ($row = mysqli_fetch_assoc($res)) {
            array_push($idaarr,$row["id_detailmateri"]);
            array_push($namaarr,$row["bab"]);
           // echo '<option value="'.$row["id_detailmateri"].'>'.$row["bab"].
           // '</option>';
            // echo"<div class='col-3'>
            // <p class='h5'>Nama Bab: ".$row["bab"]."</p>
            // <button type='button' idd1='".$row["id_detailmateri"]."' class='btn btn-danger editing'>Edit</button>
            // </div>";

          }
          //echo '</select>';
          echo sizeof($idaarr);
          echo '<br>nama: '.sizeof($namaarr);
          echo '<select id="pilih" class="form-control mt-3 mb-4" style="width: 200px;">';
          for($i=0;$i<sizeof($idaarr);$i++)
          {
            echo '<option value="'.$idaarr[$i].'">'.$namaarr[$i].'</option>';
          }
         echo '</select>';
        ?>
        <br>
        <input type = "text" name = "bab">
        <input type="submit" name="submit">
        </div>
        </center>
      </form>
    </div>
   </div>
</body>
</html>

 <script>
  $(document).ready(function(){
    $(document).on("change","#pilih",function(){
      var p=$(this).val();
      $.ajax({
        url:"database.php",
        type:"POST",
        async:false,
        data:{
          restr:p,
          changing:1
          },
          success:function(res)
          {
            $()
          }
      })
    })
  })
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

<!-- <script>
  $(document).ready(function()
  {

    $("body").delegate(".editing", "click", function(){
        var IdDelete = $(this).attr("idd1");
        var test = window.confirm("Do you want to edit this record?");
        if (test) {
          $.ajax({
            url   : "database.php",
            type  : "POST",
            async : true,
            data  : {
              deletes2   : 1, 
              id      : IdDelete
            }, 
            success : function(up){
              alert("Deleting...");
              showdata();
            }
          });
        }
      })
  });
</script> -->