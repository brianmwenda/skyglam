<?php
	//get values pass from form in login.php file
$connect= mysqli_connect("localhost","root","","login");

$username = $_POST['user'];
$password = $_POST['pass'];

//prevent mysql injection
$username =stripcslashes($username);
$password = stripcslashes($password);
$username =mysqli_real_escape_string($connect,$_POST['user']);
$password = mysqli_real_escape_string($connect,$_POST['pass']);


//connect to the server and select database

mysqli_select_db($connect,'login');

//query the database for user
$result = mysqli_query($connect,"SELECT * FROM users where username = '$username' and password = '$password'")
 or die("Failed to query database ");


$row = mysqli_fetch_array($result);




if ($row['username']== $username && $row['password'] == $password ){
	echo "login success!! welcome ".$row['username'];
	
}else{
	echo "failed to login!";
}
?>
