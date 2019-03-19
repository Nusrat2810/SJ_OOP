<?php

include_once "db_config.php";

class S{

	public $db;
        public function __construct(){
            $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
            if(mysqli_connect_errno()) {
                echo "Error: Could not connect to database.";
                    exit;
            }
        }

    public function sign_in($Name,$Email,$Password){
            $sql="SELECT * FROM user WHERE Email='$Email'";
            $check =  $this->db->query($sql) ;
            $count_row = $check->num_rows;
            if ($count_row == 0){
                $sql1="INSERT INTO user SET Name='$Name', Password='$Password', Email='$Email'";
                $result = mysqli_query($this->db,$sql1);// or die(mysqli_connect_errno()."Data cannot inserted");
               	$_SESSION['login'] = true;
                $_SESSION['Email'] = $Email;
                return $result;
            }
            else { 
            	return 'e';
            }
        }

    public function log_in($Email,$Password){
    	$sql="SELECT * FROM user WHERE Email='$Email' and Password='$Password' and ban=0";
    	$check =  $this->db->query($sql) ;
    	$user_data = mysqli_fetch_array($check);
        $count_row = $check->num_rows;

        $sql2="SELECT * FROM user WHERE Email='$Email' and Password='$Password' and ban=1";
        $check2 =  $this->db->query($sql2) ;
        $count_row2 = $check2->num_rows;

        if ($count_row == 1)
        {
        	//session_start();
           	$_SESSION['login'] = true;
            $_SESSION['Email'] = $Email;
            $_SESSION['Admin']=$user_data['Admin'];
            return $_SESSION['Admin'];
        }
        else if($count_row2 == 1)
        {
            return 'b';
        }
        else 
        { 
        	return '00';

        }

    }

    public function get_fullname($uid){
            $sql3="SELECT Name FROM user WHERE Email = '$uid'";
            $check =  $this->db->query($sql3) ;
            $user_data = mysqli_fetch_array($check);
            return $user_data['Name'];
        }

    public function q_post($cat,$qsn,$uid,$dd){
        $sql= "INSERT INTO qs SET qsn='$qsn', cat='$cat', Email='$uid', dd='$dd'";
        $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
        return $result;
    }

    public function posts(){
        $sql="SELECT * from qs order by id desc";
        $result = mysqli_query($this->db,$sql);
        if($result->num_rows>0){
        while($dd= mysqli_fetch_assoc($result))
        {
            $array[]=$dd;
        }
        return $array;
    }
    else
        return 0;

    }

    public function own_posts($uid){
        $sql="SELECT * from qs WHERE Email='$uid' order by id desc";
        $result = mysqli_query($this->db,$sql);
        if($result->num_rows>0){
        while($dd= mysqli_fetch_assoc($result))
        {
            $array[]=$dd;
        }
        return $array;
    }
    else
        return 0;
    }

    public function profile($uid){
        $sql="SELECT * from user WHERE Email='$uid'";
        $result = mysqli_query($this->db,$sql);
        while($dd= mysqli_fetch_assoc($result))
        {
            $array[]=$dd;
        }
        return $array;
    }

    public function e_profile($uid){
        $sql="SELECT * from user WHERE Email='$uid'";
        $result = mysqli_query($this->db,$sql);
        $dd= mysqli_fetch_row($result);
        return $dd;
    }

    public function c_post($pid,$dd,$msz,$uid){
     	$sql= "INSERT INTO comments SET pid='$pid', Email='$uid', dd='$dd',  cmnt='$msz'";
     	$result=mysqli_query($this->db,$sql);
    	$res=$this->show_cmnts($pid);
    	return $res;
         
        
    }

  	public function show_cmnts($id){
        $sql="SELECT * from comments WHERE pid='$id' order by cid desc";
        $result = mysqli_query($this->db,$sql);
        if($result->num_rows>0){
        while($dd= mysqli_fetch_assoc($result))
        {
            $arr[]=$dd;
        }
        return $arr;
    	}	
    	else{
        return "else";
    }
    }

    public function fb_login($Email,$Name,$Password){
        $sql="SELECT * FROM user WHERE Email='$Email'";
        $check =  $this->db->query($sql) ;
        $user_data = mysqli_fetch_array($check);
        $count_row = $check->num_rows;

        if ($count_row == 1){
            //session_start();
                $_SESSION['login'] = true;
                $_SESSION['Email'] = $Email;
                $_SESSION['Admin']=$user_data['Admin'];
                if($_SESSION['Admin']=='0')
                return "user";
                else
                {
                   return "admin";
                }
            }

        else { 
            
                $sql1="INSERT INTO user SET Name='$Name', Password='$Password', Email='$Email'";
                $result = mysqli_query($this->db,$sql1);
                $_SESSION['login'] = true;
                $_SESSION['Email'] = $Email;
                return "si";


            }

    }

    public function d_post($id){
    	$sql = "DELETE from qs WHERE id='$id'";
    	$check =  $this->db->query($sql) ;
    }

    public function users(){
        $sql= "SELECT * FROM user where Ban=0";
        $result = mysqli_query($this->db,$sql);
        if($result->num_rows>0){
        while($dd= mysqli_fetch_assoc($result))
            {
                $arr[]=$dd;
            }
            return $arr;
        }
        else{
            return 0;
        }

    }

    public function pending(){
        $sql= "SELECT * FROM req ";
        $result = mysqli_query($this->db,$sql);
        if($result->num_rows>0){
        while($dd= mysqli_fetch_assoc($result))
            {
                $arr[]=$dd;
            }
            return $arr;
        }
        else{
            return 0;
        }
    }

    public function a_post($id){

        $sql= "SELECT * FROM req where id='$id' ";
        $result = mysqli_query($this->db,$sql);
        $dd= mysqli_fetch_row($result);
        $cat=$dd[0];$qsn=$dd[1];$Email=$dd[2];$dt=$dd[4];
        $sql1= "INSERT INTO qs SET cat='$cat', qsn='$qsn', Email='$Email',  dd='$dt'";
        $result=mysqli_query($this->db,$sql1);
        $sql2 = "DELETE from req WHERE id='$id'";
        $check =  $this->db->query($sql2) ;
    }

    public function not_a_post($id){

        $sql2 = "DELETE from req WHERE id='$id'";
        $check =  $this->db->query($sql2) ;
    }

    public function r_post($cat,$qsn,$uid,$dd){

        $sql= "INSERT INTO req SET qsn='$qsn', cat='$cat', Email='$uid', dd='$dd'";
        $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
        return $result;
    }

    public function ban($id){

	    $sql = "UPDATE user SET Ban = 1 where id='$id'";
	    $result = mysqli_query($this->db,$sql);
	}

	public function admin($id){
        $sql = "UPDATE user SET Admin = 1 WHERE id = '$id'";
        $result = mysqli_query($this->db,$sql);
    }





}

?>