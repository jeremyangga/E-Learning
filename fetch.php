<?php
//fetch.php
if(isset($_POST["id"]))
{
 $connect = mysqli_connect("localhost", "root", "", "elearning");
 $query = "SELECT * FROM dosen WHERE username = '".$_POST["id"]."'";
 $print = mysqli_query($connect, $query);
 while($row = mysqli_fetch_array($print))
 {
  $data["username"] = $row["username"];
  $data["nama"] = $row["nama"];
  //$data["gender"] = $row["gender"];
  //$data["designation"] = $row["designation"];
  //$data["age"] = $row["age"];
 }

 echo json_encode($data);
}
?>