<?php 
$connect = mysqli_connect("localhost", "root", "", "elearning");
$query = "SELECT * FROM dosen ORDER BY username ASC";
$print = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
      #print 
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
      <h3 align="center">Search Data Dosen</h3><br />   
      <div class="row">
        <div class="col-md-4">
          <select name="data_dosen" id="data_dosen" class="form-control">
            <option value="">Select Dosen</option>
            <?php 
              while($row = mysqli_fetch_array($print))
              {
                echo '<option value="'.$row["username"].'">'.$row["username"].'</option>';
              }
            ?>
          </select>
        </div>
        <div class="col-md-4">
          <button type="button" name="search" id="search" class="btn btn-info">Search</button>
        </div>
      </div>
      <br />
      <div class="table-responsive" id="detail_dosen" style="display:none">
        <table class="table table-bordered">
          <tr>
            <td width="10%" align="right"><b>Username</b></td>
            <td width="90%"><span id="username_dosen"></span></td>
          </tr>
          <tr>
            <td width="10%" align="left"><b>Nama</b></td>
            <td width="90%"><span id="nama_dosen"></span></td>
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
      var id= $('#data_dosen').val();
      // var id= $(this).attr("value");
      alert(id);
      if(id != '')
      {
        alert("test");
        $.ajax({
          url:"fetch.php",
          method:"POST",
          data:{id:id},
          dataType:"JSON",
          success:function(data)
          {
            alert("sukse");
            $('#detail_dosen').css("display", "block");
            $('#username_dosen').text(data.username);
            $('#nama_dosen').text(data.nama);
          }
        })
      }
      else
      {
        alert("Please Select Dosen");
        $('#detail_dosen').css("display", "none");
      }
    });
  });
</script>