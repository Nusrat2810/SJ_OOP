<?php
session_start();
include_once '../controller/cont.php';
require_once 'fb_config.php';
$cont = new Cont();

/*if ($_SESSION['login'] == true){
		$cont->s_login();
    }*/

if (isset($_POST['login'])){
		$Email=$_POST['Email'];
		$Password=$_POST['Password'];
        $cont->log_in($Email,$Password);
    }

if (isset($_GET['f'])){
     $cont->fb();
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../design/css/style.css">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../design/js/all_js.js"></script>
	
</head>

<body>


	<div class="c2" align="right">
		<a href="index.php"><button name="si">Sign In</button></a>
	</div>
	<div class="c3" align="center">
		<p class="c"></p>
	<form action="" method="post" target="">
		Email Address:<br>
		<input type="text" name="Email" required><br>
		Password:<br>
		<input type="Password" name="Password" required><br><br>
		<input type="submit" name="login" value="Log In" id="login"><br>
	</form>
	<br>Log in using facebook<br>
	<?php echo '<a href="' . htmlspecialchars($loginUrl) . '" class="fa fa-facebook"></a>';?>
	</div>
	

</body>
</html>