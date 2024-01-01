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
          // $password=$_POST['password'];
             $sql= mysqli_query($conn,"INSERT INTO mahasiswa VALUES('$username','$nama','elearnmhs',0)");

 ?>