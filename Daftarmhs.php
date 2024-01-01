<?php
	include "connect.php";
	session_start();
	if(!isset($_SESSION["Login"])){
  		header("location: login.php");
	}
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "elearning";

    // // Create connection
    // $conn = new mysqli($servername, $username, $password,$dbname);
?>

<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
  <!--   <style>
      #print 
      {
        position: absolute;
        width: 100%;
        max-width:870px;
        cursor: pointer;
        overflow-y: auto;
        max-height: 400px;
        box-sizing: border-box;
        z-index: 1001;
      }
      .link-class:hover{
        background-color:#f1f1f1;
      }
    </style>
 -->  </head>
 <title>Home</title>
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
  	    <br /><br />
    	<div class="container" style="width:900px;">
      		<h3 align="center">Input Data Mahasiswa</h3><br />   
      		<div class="row">
      			<div class="form-element">
	    			<center>
	        			<label>Username</label><br>
	     				<input type="text" name="username_mhs" id="username_mhs">
	        		</center>
	    		</div>
	    		<div class="form-element">
	        		<center>
	        			<label>Nama Lengkap</label><br>
	        			<input type="text" name="nama_mhs" id="nama_mhs">
	    			</center>
	    		</div>
	    <!-- <div class="form-element">
	        <center>
	        	<label>Password</label><br>
	        	<input type="password" name="pass_mhs" id="pass_mhs">
	    	</center>
	    </div> -->
        		<div class="col-md-4">
        			<center>
          				<button type="button" name="add" id="add" class="btn btn-info">Add</button>
          			</center>
        		</div>
      		</div>
      		<br />
      	</div>
     </div>
    </div>
  </body>
</html>

<!-- <script>
  $("#FORM_ID").submit(function() {
                var name= $("#name").val();
                var password= $("#password").val();

                $.ajax({
                    type: "POST",
                    url: "insert.php",
                    data: "name=" + name+ "&password=" + password,
                    success: function(data) {
                       alert("sucess");
                    }
                });


            });
</script> -->

<script>
  $(document).ready(function()
  {
    $('#add').click(function()
    {
      var username= $('#username_mhs').val();
      var nama= $('#nama_mhs').val();
      // var password= $('#pass_mhs').val();
        $.ajax({
          url:"insertmhs.php",
          method:"POST",
          data: "username=" + username+ "&nama=" + nama,
          // dataType:"JSON",
          success:function(data)
          {
            alert("Input Sukses");
          }
        })
    });
  });
</script>