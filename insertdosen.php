<?php
    //------insert.php------
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "elearning";

    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $username=$_POST['username'];
    $nama=$_POST['nama'];
      $sqlcekdosen="Select * from dosen where username='$username'";
      $cekdosen=mysqli_query($con,$sqlcekdosen);
      if(mysqli_num_rows($cekdosen)>0){
        echo('<script type="text/javascript">alert("Gagal input, Username sudah diambil");</script>');
          header("location:homeadmin.php");
      }
       else{   
          // $password=$_POST['password'];
             $sql= mysqli_query($conn,"INSERT INTO dosen VALUES('$username','$nama','elearndosen')");
             echo '<script>alert("Input Sukses")</script>';
           }
 ?>