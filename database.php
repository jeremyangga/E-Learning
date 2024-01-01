<?php

include "connect.php";

if (isset($_POST['deletes'])) {
	$user=$_POST['id'];
	// echo $user;
	$sql = "DELETE FROM dosen WHERE username = '$user'";
	$result = mysqli_query($con, $sql);
	if ($result) {
		echo "Delete Sukses!";
	}
	exit();
}
if (isset($_POST['deletes1'])) {
	$user=$_POST['id'];
	$sql = "DELETE FROM mahasiswa WHERE username = '$user'";
	$result = mysqli_query($con, $sql);
	if ($result) {
		echo "Delete Sukses!";
	}
	exit();
}

if (isset($_POST['edit'])){
	$sql = "UPDATE mahasiswa SET nilai='$nilai' where id=$id";
	$result = mysqli_query($con, $sql);
	if ($result) {
		echo "Edit Sukses!";
	}
	exit();
}
?>