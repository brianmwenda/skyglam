<?php
$connect = mysqli_connect("localhost","root","","aggytrends");

//if insert button is pressed
if(isset($_POST['insert'])){
  //get the submitted data
  $target = "uploads/".basename($_FILES['image']['name']);

  $file= addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  $text = $_POST['text'];
  $query= "INSERT INTO tbl_images(name,texts) VALUES ('$file','$text')";

  if(mysqli_query($connect, $query)){
    echo '<script> alert("image inserted into Database")</script>';
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

       	?>

        <form class="frm" method = "POST" action="database.php" enctype="multipart/form-data">

          

        <div>
            <input type = "file" name= 'image' id="image">
           
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