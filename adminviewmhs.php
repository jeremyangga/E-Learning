<?php 
$connect = mysqli_connect("localhost", "root", "", "elearning");
$query = "SELECT * FROM mahasiswa ORDER BY username ASC";
$result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
      #result 
      {
        position: absolute;
        width: 100%;
        max-width:870px;
        cursor: pointer;
        overflow-y: auto;
        max-height: 400px;
        box-sizing: border-box;
        z-index: 1001;
      }
      .link-class:hover{
        background-color:#f1f1f1;
      }
    </style>
  </head>
  <body>
    <br /><br />
    <div class="container" style="width:900px;">
      <h3 align="center">Search Data Mahasiswa</h3><br />   
      <div class="row">
        <div class="col-md-4">
          <select name="data_mahasiswa" id="data_mahasiswa" class="form-control">
            <option value="">Select Mahasiswa</option>
            <?php 
              while($row = mysqli_fetch_array($result))
              {
                echo '<option value="'.$row["username"].'">'.$row["username"].'</option>';
              }
            ?>
          </select>
        </div>
        <div class="col-md-4">
          <button type="button" name="search" id="search" class="btn btn-info">Search</button>
        </div>
        <!-- <div class="col-md-4">
          <button type="button" name="edit" id="edit" class="btn btn-info">Edit</button>
        </div> -->
      </div>
      <br />
      <div class="table-responsive" id="detail_mahasiswa" style="display:none">
        <table class="table table-bordered">
          <tr>
            <td width="10%" align="right"><b>Username</b></td>
            <td width="90%"><span id="username_mahasiswa"></span></td>
          </tr>
          <tr>
            <td width="10%" align="left"><b>Nama</b></td>
            <td width="90%"><span id="nama_mahasiswa"></span></td>
          </tr>
          <tr>
            <td width="10%" align="left"><b>Nilai</b></td>
            <td width="90%"><span id="nilai_mahasiswa"></span></td>
          </tr>
        </table>
      </div>
    </div>
  </body>
</html>

<script>
  $(document).ready(function()
  {
    $('#search').click(function()
    {
      var id= $('#data_mahasiswa').val();
      if(id != '')
      {
        $.ajax({
          url:"fetch2.php",
          method:"POST",
          data:{id:id},
          dataType:"JSON",
          success:function(data)
          {
            $('#detail_mahasiswa').css("display", "block");
            $('#username_mahasiswa').text(data.username);
            $('#nama_mahasiswa').text(data.nama);
            $('#nilai_mahasiswa').text(data.nilai);
          }
        })
      }
      else
      {
        alert("Please Select First");
        $('#detail_mahasiswa').css("display", "none");
      }
    });

    $('#edit').click(function()
    {
      $.ajax({
        url:"edit.php",
        method:"POST",
        data:{id:id},
        dataType:"JSON",
        
      })
    })
  });
</script>