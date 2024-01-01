<?php
  include "connect.php";
    session_start();
    if (!isset($_SESSION["Login"])){
      header("location: login.php");
    }
    $namabab=$_SESSION['NamaBab'];
    echo $namabab.'<br>';
    $getid="SELECT * from detail_materi where bab='$namabab'";
    $get=mysqli_query($con,$getid);
    while($row=mysqli_fetch_assoc($get))
    {
      $idbab=$row["id_detailmateri"];
    }
    echo $idbab;
    $user=$_SESSION["Username"];
    echo $user;
    $isimateri=$_POST["isimateri"];
    if(isset($_POST['ok']))
    {
    	echo 'masuk';
    	$sql= "INSERT INTO materi VALUES (NULL, '$user','$isimateri', $idbab)";    	
    	echo $_POST['isimateri'];
    	$input=mysqli_query($con,$sql);
        header("location:homedosen.php");
    }
?>