<?php
 $namabab=$_POST['namabab'];
 
// echo '<script> alert('.$namabab.') </script>';
 echo '<h1 style="text-align:center">Nama bab: '.$namabab.'</h1>';
echo '<center><br><form method="post" action =""><textarea name="isimateri"></textarea><br><br>
		<button class="btn btn-primary btn-lg" type="submit" name="addmateri">Add Materi</button></form></center>
		';
if(isset($_POST['addmateri']))
{
	// header("location:addmateri.php");
	// $isi=$_POST['isimateri'];
	// echo '<script>alert('.$isi.')</script>';	
}
?>