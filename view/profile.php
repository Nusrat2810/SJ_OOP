<?php
session_start();
include_once '../controller/cont.php';
$cont = new Cont();
/*if ($_SESSION['login'] == false){
		header("location:index.php");
    }*/
$uid = $_SESSION['Email'];

if (isset($_GET['q'])){
     $cont->logout();
    }

if (isset($_GET['a'])){
     if($_SESSION['Admin']=='1')
     {
     	header('location:admin_welcome.php');
     }
     else
     {
     	header('location:welcome.php');
     }
    }

?>


<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="../design/css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
	
	<div class="h">
         <ul>
            <li class="hh"><i class="fas fa-align-justify"></i>
               <ul>
                  <li><a href="profile.php?a=admin">Home</a></li>
                  <li><a href="Profile.php">Profile</a></li>
                  <li><a href="own_post.php">My Posts</a></li>
                  <li><a href="profile.php?q=logout">Logout</a></li>
                
               </ul>
            </li> 
         </ul>
      </div>

	<div class="c7" align="center">
		<?php
		$list=$cont->profile($uid);
		foreach ($list as $k) {
		echo "Name: ",$k['Name'],"<br>","Email: ",$k['Email'],"<br>";
	
		}
	?>
		<!--<br><button name="edit" onclick="window.location.href = 'edit_p.php';">Edit Profile</button>-->
	</div>
	

</body>
</html>