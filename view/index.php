<?php

session_start();
include_once '../controller/cont.php';
$cont = new Cont();
//$lg=$cont->get_session();
/*if ($_SESSION['login'] == true){
		$cont->s_login();
    }*/
if (isset($_REQUEST['register'])){
        extract($_REQUEST);
        $cont->sign_in($Name, $Email,$Password);
    }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Log In or Sign In</title>
	<link rel="stylesheet" type="text/css" href="../design/css/style.css">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../design/js/all_js.js"></script>
</head>

<body>
	<div class="c2" align="right">
		<a href="login.php"><button name="lb">Log In</button></a>
	</div>
	
	<div class="c3" align="center">
		<p id="c" class="danger"></p>
	<form action="" method="post" target="_blank">
		Full Name:<br>
		<input type="text" name="Name" required placeholder="EX: Alex Joe" id="Name"><br>
		Email Address:<br>
		<input type="text" name="Email" required placeholder="EX: Alex@gmail.com" id="Email"><br>
		Password:<br>
		<input type="Password" name="Password" required placeholder="******"  min="6" id="Password"><br>
		<input type="submit" name="register" value="Submit" id="reg"><br>
	</form>
	</div>

</body>
</html>