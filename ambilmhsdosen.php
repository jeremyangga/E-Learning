<?php
session_start();
if (!isset($_SESSION["Login"])){
  header("location: loginadmindosen.php");
}
    $nama=$_REQUEST['carinama'];
    $namaencode=urlencode($nama);
    $pil=$_REQUEST['pilihan'];
    echo $nama.'<br>'.$pil;
    if($pil=="john"){
        echo '
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $.getJSON("http://john.petra.ac.id/~justin/finger.php?s='.$namaencode.'",function(data){
                    for(i in data.hasil){
                        $("#datamd").append("<tr><td>"+
                        data.hasil[i].nama+"</td><td>"+
                        data.hasil[i].login+"</td></tr>");
                    }
                });
            });
        </script>
        ';
    }
    else{
        echo '
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $.getJSON("http://peter.petra.ac.id/~justin/finger.php?s='.$namaencode.'",function(data){
                    for(i in data.hasil){
                        $("#datamd").append("<tr><td>"+
                        data.hasil[i].nama+"</td><td>"+
                        data.hasil[i].login+"</td></tr>");
                    }
                });
            });
        </script>
        ';
    }
?>
<!-- <table class="table table-striped">
    <thead>
        <tr>
            <th>Nama</th>
            <th>User Login</th>
        </tr>
    </thead>
    <tbody id="datamd"></tbody>
</table> -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
