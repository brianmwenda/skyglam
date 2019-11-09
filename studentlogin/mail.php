<?php


        require ("phpMailer/PHPMailer.php");

        function mail_send($to,$sub,$body){
          $mail = new PHPMailer();

          //smtp configuration
          $mail -> isSMTP();
          $mail -> Host = 'smtp.gmail.com';
          $mail -> SMTPAuth = true;
          $mail -> username = 'brianmwe425@gmail.com';
          $mail -> Password = 'kirianiboys';
          $mail -> SMTPSecure = 'tls';
          $mail -> Port = 587;

          $mail -> setFrom('skyglam@gmail.com','skyglam');

          //add a recipient
          $mail -> addAddress($to);
          //email subject
          $mail -> Subject = $sub;
          //set  email format
          $mail -> isHTML(true);

          //email body
          $mailContent = $body;
          $mail -> Body = $mailContent;

          //send emaile
          if(!$mail -> send()){
            return FALSE;

          }else{
            return TRUE;

          }


        }
?>
