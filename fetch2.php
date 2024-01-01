<?php
//fetch.php
if(isset($_POST["id"]))
{
 $connect = mysqli_connect("localhost", "root", "", "elearning");
 $query = "SELECT * FROM mahasiswa WHERE username = '".$_POST["id"]."'";
 $result = mysqli_query($connect, $query);
 while($row = mysqli_fetch_array($result))
 {
  $data["username"] = $row["username"];
  $data["nama"] = $row["nama"];
  $data["nilai"] = $row["nilai"];

 }

 echo json_encode($data);
}
?>