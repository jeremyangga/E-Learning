<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "elearning");
$query = "SELECT * FROM mahasiswa ORDER BY username ASC";
$print = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <br /><br />
    <div class="container" style="width:900px;">
      <div class="jumbotron jumbotron-fluid">
        <center>
        <h3 align="center">Delete Data Mahasiswa</h3><br />   
        <div class="row showdata">
          <?php 
            $host = "localhost";
            $user = "root";
            $pass = "";
            $database = "elearning";
            $con = mysqli_connect($host, $user, $pass, $database);

          $sql = "SELECT * FROM mahasiswa";
          $res = mysqli_query($con, $sql);
          while ($row = mysqli_fetch_assoc($res)) {
            echo"<div class='col-3'>
            <p class='h5'>Username: ".$row["username"]."</p>
            <p class='h5'>Name: ".$row["nama"]."</p>
            <button type='button' idd='".$row["username"]."' class='btn btn-danger deleting'>Delete</button>
            </div>";
          }
        ?>
        </div>
      </center>
      <br />
    </div>
    </div>
  </body>
</html>

<script>
  $(document).ready(function()
  {

    $("body").delegate(".deleting", "click", function(){
        var IdDelete = $(this).attr("idd");
        var test = window.confirm("Do you want to delete this record?");
        if (test) {
          $.ajax({
            url   : "database.php",
            type  : "POST",
            async : true,
            data  : {
              deletes1   : 1, 
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
</script>