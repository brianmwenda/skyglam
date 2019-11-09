
<?php

  //Define variables and set to empty values
  $name_error = $email_error = $phone_error = "";
  $name = $email = $phone = $message =$success = "";

  //form is submitted with post method
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["name"])){
      $name_error = "Name is required";
    }else{
      $name = test_input($_POST["name"]);
      //check if name only contains letters and whitespaces
      if(!preg_match("/^[a-zA-Z]*$/", $name)){
        $name_error = "only letters and white space allowed";
      }
    }
    if(empty($_POST["email"])){
      $email_error = "Email is required";
    }else{
      $email = test_input($_POST["email"]);

      //check if email address is well-formed
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_error = "Invalid email format";
      }
    }
    if(empty($_POST["phone"])){
      $phone_error = "phone is required";
    }else{
      $phone = test_input($_POST["phone"]);
      //check if email address is well-formed
      if(!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\}s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $phone)){
        $phone_error = "Invalid phone number";
      }
    }
    if(empty($_POST["url"])){
      $url_error = "";
    }else{
      $url = test_input($_POST["url"]);
      //check f url address syntax is valid(this regular expression also alllows dashes in the url)
      if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.[-a-az0-9+&@#\/%?=~_\!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)){
        $url_error = "Invalid url";
      }
    }
    if(empty($_POST["message"])){
      $message = "";
    }else{
      $message = test_input($_POST["message"]);
    }

    if($name_error =='' and $email_error == '' and $phone_error == ''){
      $message_body ='';
      unset($_POST['submit']);
      foreach($_POST as $key => $value){
        $message_body .= "$key: $value\n";
      }
      $to = "brianmwe425@gmail.com";
      $subject = 'contact form submit';
      if(mail($to, $subject, $message)){
        $success = "message sent, thank you for contacting us!";
        $name = $mail = $phone = $message = '';
      }
    }
  }
  function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>
