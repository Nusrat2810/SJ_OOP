<?php 
date_default_timezone_set('Europe/Copenhagen');
include_once '../controller/cont.php';
$cont = new Cont();
session_start();
if(isset( $_POST['par1'])) {
	$uid=$_SESSION['Email'];
	//echo $uid;
   	$pid=$_POST['pid'];
   	//echo $pid;
	$msz=$_POST['msz'];
	//echo $msz;
	$dd=date('Y-m-d H:i:s');
	//echo $dd;
    $result=$cont->c_post($pid,$dd,$msz,$uid);
    echo $result;
}

if(isset( $_POST['par2'])) {
  $Email=$_POST['Email'];
  //echo $Email;
  $Name=$_POST['Name'];
  //echo $Name;
  $Password=$_POST['Password'];
  //echo $Password;
  $result = $cont->sign_in($Name, $Email,$Password);
  echo $result;
}
if(isset( $_POST['par3'])) {
  $Email=$_POST['Email'];
  $Password=$_POST['Password'];
  //echo $Email;
  //echo $Password;
  $result = $cont->log_in($Email,$Password);
  echo $result;
}
if(isset( $_POST['par4'])) {
  $dd=date('Y-m-d H:i:s');
  $uid=$_SESSION['Email'];
  $cat=$_POST['cat'];
  $qsn=$_POST['qsn'];
 $result= $cont->r_post($cat,$qsn,$uid,$dd);
  echo $result;
}
?>
