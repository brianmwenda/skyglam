


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>login page</title>
	
</head>
<body>
		<div id="frm">
			<form class="form" action="process.php" method="POST">
				<p>
					<label>username:</label>
					<input type="text" id="user" name="user"/>
				</p>
				<p>
					<label>password:</label>
					<input type="password" id="pass" name="pass"/>
				</p>
				<p>
					
					<input type="submit" id="btn" value="login"/>
				</p>
			</form>
		</div>
		<style>
			body{
				
					background:black;
				}
				#frm{
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


	</body>
</html>

