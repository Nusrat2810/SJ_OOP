<?php
   date_default_timezone_set('Europe/Copenhagen');
   session_start();
   /*if ($_SESSION['login'] == false){
   		header("location:index.php");
       }*/
   include_once '../controller/cont.php';
   $cont = new Cont();
   $uid = $_SESSION['Email'];
   
   if (isset($_GET['q'])){
        $cont->logout();
       }
   
   if (isset($_REQUEST['post'])){
           extract($_REQUEST);
            $dd=date('Y-m-d H:i:s');
           $cont->r_post($cat,$qsn,$uid,$dd);
       }   
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Welcome</title>
      <link rel="stylesheet" type="text/css" href="../design/css/style.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
      <script type="text/javascript" src="../design/js/all_js.js"></script>
   </head>
   <body>
      <div class="h">
         <ul>
            <li class="hh"><i class="fas fa-align-justify"></i>
               <ul>
                  <li><a href="welcome.php">Home</a></li>
                  <li><a href="Profile.php">Profile</a></li>
                  <li><a href="own_post.php">My Posts</a></li>
                  <li><a href="welcome.php?q=logout">Logout</a></li>
               </ul>
            </li> 
            <li>Hello <?php $cont->get_fullname($uid);?></li>
         </ul>
      </div>
      <div class="c6" align="center">
         <div id='p'></div>
         <h1>Post your question here!</h1>
         <form action="" method="POST" target="" id="pf">
            <input type='text' name='cat' placeholder="Add a categoy of your question" id="cat" ></input>
            <input type='text' name='qsn' placeholder="Write your question here" id="qsn"></input>
            <input type="submit" name="post" value="Post" id='post'></input>
         </form>
      </div>
      <?php
         $list=$cont->posts();
         ?>
      <?php
      if($list){
         foreach ($list as $k) {?>
      <div class="cmnt" align="center">
         <div align="left"><?php echo "posted by: ",$k['Email'],"<br>";?></div>
         <?php echo '<h2>',$k['qsn'],"</h2>";?>
         <?php $id= $k['id'];
            ?>
         <h3>comments:</h3>
         <br>
         <?php $list2= $cont->show_cmnts($id);
            ?>
         <div id="<?php echo $id; ?>c">
            <?php if($list2 !='else'){
               foreach ($list2 as $kk) {?>
            <?php
               echo $kk['cmnt'],"<br>";

               echo $kk['dd'],"<br>";
               echo "By: ",$kk['Email'],"<br><br>";
               }
               }
               else
               {
                  echo "No comments<br><br>";
               }
               ?>
         </div>
         <form method='POST' id="<?php echo $id; ?>">
            <input type="hidden" name="pid" value="<?php echo ($id); ?>" id="pid">
            <textarea name='msz' placeholder='Leave a comment' class="msz"></textarea><br>
            <button id="comnt" name="cm">Comment</button>
         </form>
      </div>
      <?php } 
   }
   else
         {?>
            <div class="cmnt" align="center">
           <?php echo "No Post<br><br>"; ?>
        </div>
         <?php }

      ?>
   </body>
</html>

