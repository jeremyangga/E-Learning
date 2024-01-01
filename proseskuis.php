<?php
	session_start();
  include "connect.php";
  if (!isset($_SESSION["Login"])){
  header("location: login.php");
  }
  $user=$_SESSION["Username"];
  $jumlah=$_SESSION["Jumlah"];
  $iddetailquiz=$_SESSION["Pilihquiz"];
  echo $iddetailquiz;
  echo '<br>'.$jumlah.'<br>';
  if(isset($_POST["submit"]))
  {
  	$jawabarr=array();
  	$scorearr=array();
  	$scoremhs=array();
  	$jawabanmhs=array();
  	$sqljawaban="SELECT * from quiz where id_detailquiz='$iddetailquiz'";
  	$tampil=mysqli_query($con,$sqljawaban);
  	while($row=mysqli_fetch_assoc($tampil))
  	{
  		array_push($jawabarr,$row['jawaban']);
  		array_push($scorearr,$row['score']);
  	}
  	for($i=0;$i<(int)$jumlah;$i++)
  	{
  		array_push($jawabanmhs,$_POST["jawaban$i"]);
  		if($jawabanmhs[$i]==$jawabarr[$i])
  		{
  			array_push($scoremhs,$scorearr[$i]);
  		}
  		else
  		{
  			array_push($scoremhs,0);
  		}
  	}
  	$scoreakhir=0;
  	for($i=0;$i<(int)$jumlah;$i++)
  	{
  		$scoreakhir=(int)$scoreakhir+(int)$scoremhs[$i];
  		echo $scoremhs[$i].'<br>';
  	}
  	echo 'Score akhir= '.$scoreakhir;
  	$sqlambilnamaquiz="SELECT * from detail_quiz where id='$iddetailquiz'";
  	$res=mysqli_query($con,$sqlambilnamaquiz);
  	$namaquiz='';
  	while($row=mysqli_fetch_assoc($res))
  	{
  		$namaquiz=$row['namaquiz'];
  	}
  	echo '<br>'.$namaquiz;
  	$insertdata="INSERT into nilai values (NULL,'$user',$iddetailquiz,'$namaquiz',$scoreakhir)";
  	$insert=mysqli_query($con,$insertdata);
  	if($insert)
  	{
  		echo 'Berhasil';
  		header("location:utama.php");
  	}
  	else
  	{
  		echo 'gagal';
  	}
  }
  	$updatedata="UPDATE mahasiswa Set nilai ='$scoreakhir' where username=$user";
  	$update=mysqli_query($con,$updatedata );
  	if($insert)
  	{
  		echo 'Berhasil';
  		header("location:utama.php");
  	}
  	else
  	{
  		echo 'gagal';
  	}
?>