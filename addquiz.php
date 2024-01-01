<?php
	session_start();
	$user=$_SESSION["Username"];
	include "connect.php";
	$iddetailquiz;
	$jumlah;
	$isiquiz=array();
	$jawaban=array();
	$nomor=array();
	if(!isset($_SESSION['Login']))
	{
		header("location:loginadmindosen.php");
	}
	if(isset($_POST['tambahquiz']))
	{
		$sql = "Select id,jumlah from detail_quiz";
		$a=mysqli_query($con,$sql);
		while($row = mysqli_fetch_assoc($a))
		{
			$iddetailquiz=$row['id'];
			$jumlah=$row['jumlah'];
		}
		$score=(double)100/(double)$jumlah;	
		for($i=1;$i<=(int)$jumlah;$i++)
		{
			$isi=$_POST["isiquiz$i"];
			$jawab=$_POST["jawaban$i"];
			if($jawab=="benar")
			{
				array_push($jawaban,"benar");
			}
			else
			{
				array_push($jawaban,"salah");
			}
			array_push($isiquiz,$isi);
			array_push($nomor,$i);
		}
		for($i=0;$i<(int)$jumlah;$i++)
		{
			echo 'Nomor: '.$nomor[$i].'Isi : '.$isiquiz[$i].' Jawaban : '.$jawaban[$i].'<br>';
			$addquiz="INSERT into quiz value (NULL,$nomor[$i],'$isiquiz[$i]',$score,'$jawaban[$i]',$iddetailquiz)";
			$add=mysqli_query($con,$addquiz);
		}
		echo '<script>alert("Berhasil ditambahkan")</script>';
		//header("location:homedosen.php");
	}
?>