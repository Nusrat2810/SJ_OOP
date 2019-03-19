<?php
session_start();
include_once '../controller/cont.php';
$cont = new Cont();
/*if ($_SESSION['login'] == false){
    header("location:index.php");
    }*/
$uid = $_SESSION['Email'];
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

if (isset($_GET['q'])){
     $cont->logout();
    }

if(isset($_GET['ban'])){
  $id=$_GET['ban'];
  //echo $Email;
  $cont->ban($id);
}
if(isset($_GET['admin'])){
  $id=$_GET['admin'];
  $cont->admin($id);
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>All Users</title>
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
                  <li><a href="users.php?q=logout">Logout</a></li>
               </ul>
            </li> 
         </ul>
      </div>
 
  
    <?php
    $list=$cont->users();
    //print_r($list);
    if($list){
    foreach ($list as $k) { ?>
      <div class="c7" align="center">
      <?php echo "Name: ",$k['Name'],"<br>","Email: ",$k['Email'],"<br><br>";
      $id=$k['id'];
       ?>
      <button name="edit" onclick="window.location.href='users.php?ban= <?php echo $id; ?>';">Ban User</button>
      <button name="edit" onclick="window.location.href='users.php?admin= <?php echo $id; ?>';">Make Admin</button>
    </div>

    <?php }
  }
  else{ ?>
    <div class="c7" align="center">
      <?php echo "No user available";?>
    </div>

  <?php }
   ?>
  }



  
  

</body>
</html>