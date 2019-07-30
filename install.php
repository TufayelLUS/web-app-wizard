<!DOCTYPE html>
<html>
<head>
	<title>WebApp Installation Wizard Developed by Tufayel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
		.textarea
		{
			resize: none;
			width: auto;
			height: 300px;
		}

	</style>
	<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.5/js/mdb.min.js"></script>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.5/css/mdb.min.css" rel="stylesheet">
</head>
<?php
error_reporting(0);
	if(file_exists("config.php"))
	{

		?>
<body>
	<br><br><center><strong><h1>We are done with installation!</h1><br><h3>Your web application is already installed!</h3></strong></center>
</body>
</html>
		<?php
		exit();
	}
	if(isset($_POST['host']))
	{
		$host = $_POST['host'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$dbname = $_POST['dbname'];
		$mysqli = new mysqli($host, $username, $password, $dbname);
		if($mysqli->connect_errno)
		{
			?>
<body>
	<br><br><center><strong><h1>Configuration does not work!</h1><br><h3>Uh oh! We are unable to connect to database with your given information! <a href="<?php echo $_SERVER['PHP_SELF']; ?>">Try again</a> ...</h3></strong></center>
</body>
</html>
			<?php
			exit();
		}
		$config = <<<here
<?php
	\$host = "$host";
	\$db_user = "$username";
	\$db_pwd = "$password";
	\$db_name = "$dbname";
?>
here;
file_put_contents("config.php", $config);
?>
<body>
	<br><br><center><strong><h1>We are done with installation!</h1><br><h3>Congratulations! We have successfully created database file for you!</h3></strong></center>
</body>
</html>


<?php
exit();
	}

?>
<body>
	<br><br><center><strong><h1>Welcome to Installation Wizard</h1><br><h3>Please fill in the required information and you are ready to go</h3></strong></center>
	<br>
	<center>
		<form class="form form-control-md container py-3" method="POST">
			<strong>Database Host</strong><br><br>
			<input class="form-control " type="text" id="host" name="host" placeholder="localhost" required><br>
			<strong>Database Username</strong><br><br>
			<input class="form-control " type="text" id="username" name="username" placeholder="username" required><br>
			<strong>Database Password</strong><br><br>
			<input class="form-control " type="text" id="password" name="password" placeholder="password"><br>
			<strong>Database Name</strong><br><br>
			<input class="form-control " type="text" id="dbname" name="dbname" placeholder="database name" required><br>
			<input class="btn bg-success text-white" type="submit" name="" value="Connect Database">
		</form>
	</center><br><br>
</body>
</html>
