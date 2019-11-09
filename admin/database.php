
<?php
$connect = mysqli_connect("localhost","root","","admin");

//if insert button is pressed
if(isset($_POST['btn'])){
  //get the submitted data
  $target = "uploads/".basename($_FILES['Department']['User Name']['password']);

  //$file= addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  $text = $_POST['Department'];
  $user = $_POST['User Name'];
  $passwd = $_POST['password'];
  $query= "INSERT INTO log_tbl(department,username,password) VALUES ('$text','$user','$passwd')";

  if(mysqli_query($connect, $query)){
    echo '<script> alert("Admin registration Successful!!!")</script>';
  }else{
    echo 'failed to reg';
  }

}
  ?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>image upload</title>

    <style type="text/css">

    body{
    background:grey;

#frm{
    margin-left:50%;
    border:solid gray 1px;
    width:20%;
    border-radius:5px;
    margin:100px auto;
    background:white;
}
#btn{

    color:#fff;
    background:#337ab7;
    padding:5px;
    margin-left:69%;
}



    </style>

</head>
<body>

    <div id = "content">
    	<?php
/*
          $query = "SELECT * FROM tbl_images ORDER BY id DESC";
          $result = mysqli_query($connect, $query);
          while ($row = mysqli_fetch_array($result)){

              echo "<div id='img_div'>";
            echo '<tr>
                  <td>
                      <img src="data:image/jpeg; base64, '.base64_encode($row['name']).'"/>
                </td>
                </tr>';
            echo "<p>".$row['texts']."</p>";
          echo "</div>";
          }
*/
       	?>
//
<div class="signin">

<div id="frm">


  <form method="POST">
<h2 style="color:white">Admin Registration</h2>
<input type="text" id="Dep" name="user" placeholder="Department">
<input type="text" id="user" name="user" placeholder="User Name">
<input type="password" id="pass" name="pass" placeholder="password"><br><br>



    <input type="submit" name="btn" id="btn" value="submit" onclick="myFunction()"><br><br>
<div id="container">

        <a href="reset.html" style="margin-right:0px; font-size: 13px; font-family: Tahoma, Geneva, sans-serif;">Reset Password</a>
    <a href="forgot.html" style="margin-left:30px; font-size: 13px; font-family: Tahoma, Geneva, sans-serif;">Forgot Password</a><br><br><br><br>
    <a href="log.html" style="text-decoration:none"><strong>BACK</strong></a>
</div><br><br><br><br><br><br>

</form>
</div>
</div>
//


        <form class="frm" method = "POST" action="database.php" enctype="multipart/form-data">



        <div>
            <input type = "text" name= 'department' id="Dep">

        </div>
        <div>
            <input type = "text" name= 'user' id="user">

        </div>
        <div>
            <input type = "password" name= 'pass' id="pass" placeholder="password">

        </div>
        <div>
            <textarea name='text' cols='40' rows='4' placeholder='say something about this image...'></textarea>
        </div>

        <div>
            <input class="btn" type ="submit" name='insert' id="insert" value="insert">
        </div>

</form>
</div>
</body>
</html>
<script type="text/javascript">
     $(document).ready(function(){
    $('#insert').click(function(){
    var image_name = $('#image').Val();
    if(image_name == ''){
      alert("please select image");
      return false;
    }else{
      var extension = $('#image').Val().split('.').pop().toLowerCase();
      if(jQuery.inArray(extension,['gif','png','jpg','jpeg'])==-1){
        alert('invalid image file');
        $('#image').Val('');
        return false;
      }
    }
  });
  });
</script>
