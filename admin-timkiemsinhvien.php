<?php require("header.php"); ?>
<title>Tìm kiếm sinh viên - Admin</title>
<link rel="stylesheet" href="css/style.css">

</head>




<body>
  <?php require("topnavbar.php") ?>
  <?php
  if( !(isset($_SESSION["userid"]) && $_SESSION["userloaiuser"] == 1) )
    header("Location:index.php");
?>
  <hr><hr><hr>



  <div class="container">
    <div class="row">
      <div class="col-lg-12">

      <table class="table table-hover">
        <thead>
          <th><label>MSSV/Họ&Tên/Lớp</label></th>
        </thead>


        <tbody>
          <tr>
            <td><input class="input-lg" type="text" placeholder="thông tin sinh viên" name="ttsinhvien" id="ttsinhvien" required=""></td>

            <td><div class="alert alert-warning"><strong>Lưu ý:</strong>Tìm kiếm sinh viên theo: MSSV/Họ&Tên/Lớp</div></td>
          </tr>

        </tbody>
      </table>
      <table class="table table-hover">
        <thead>
          <th><label>Mã sinh viên</label></th>
          <th><label>Họ và Tên</label></th>
          <th><label>Lớp</label></th>
        </thead>

        <tbody id='landing'></tbody>

      </table>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"admin-timkiemsinhvien-ajax.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#landing').html(data);
   }
  });
 }
 $('#ttsinhvien').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>


<?php require("footer.php") ?>
