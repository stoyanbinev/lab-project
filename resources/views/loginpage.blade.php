<!DOCTYPE html>
<html>
	<head>
		<title>Login Page</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/design.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body id = "loginPage">
		<div class="container" id="loginForm">
            <h2 id = "title">Computer Gaming Society</h2>
			<form class="form-horizontal">
                <img id = "logo" src="joystick.png" alt ="controller" width="100" height="100"/>
				<div class="form-group" id = "emailtxt">
					<label class="control-label col-sm-2" for="email" >Email:</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
					</div>
				</div>
				<div class="form-group" id = "pwdtxt">
					<label class="control-label col-sm-2" for="pwd">Password:</label>
					<div class="col-sm-10">          
						<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
					</div>
                </div>
            </form>
            <div>
				<a href="listOfItems.php" class="btn btn-primary" style="border:none" id="login">Login</a>
			</div>
		</div>
	</body>
</html>




