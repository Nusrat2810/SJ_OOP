<?php

include_once "../model/sql_command.php";


class Cont{
    public $mod;
    public function __construct() {
        $this->mod = new S();
    }

        /*** for registration process ***/
	public function sign_in($Name,$Email,$Password){
           // session_start();
        $Password = md5($Password);
        $res= $this->mod->sign_in($Name,$Email,$Password);
        echo $res;
    }

    public function log_in($Email,$Password){

    	$Password = md5($Password);
    	$res= $this->mod->log_in($Email,$Password);
        echo $res;

    }

    public function s_login(){

        if($_SESSION['Admin']=='0'){
        header("location:welcome.php");
        }
        else
        {
            header("location:admin_welcome.php");
        }
    }

    public function get_fullname($uid){

            $res= $this->mod->get_fullname($uid);
            echo $res;
        }

    public function logout() {

            session_start();
            session_unset();
            $_SESSION['login'] = FALSE;
            header("location:index.php");
        }

    public function q_post($cat,$qsn,$uid,$dd){

        $res= $this->mod->q_post($cat,$qsn,$uid,$dd);
        if($res)
        {
            header("location:own_post.php");
        }
    }

    public function posts(){

        $res=$this->mod->posts();
        return $res;

    }

    public function own_posts($uid){

        $res=$this->mod->own_posts($uid);
        return $res;
    }

    public function get_session(){

            return $_SESSION['login'];
        }

    public function profile($uid){

        $res=$this->mod->profile($uid);
        return $res;
    }

    public function e_profile($uid){

        $res=$this->mod->e_profile($uid);
        return $res;
    }

    public function c_post($pid,$dd,$msz,$uid){

        $res= $this->mod->c_post($pid,$dd,$msz,$uid);
         foreach ($res as $kk) {
            echo "$kk[cmnt]<br>";
            echo "$kk[dd]<br>";
            echo "By: $kk[Email]<br><br>";
        }
        
    }
    
    public function show_cmnts($id){
        $res=$this->mod->show_cmnts($id);
        return $res;
    }

    public function fb_login($Email,$Name){
        $Password = md5('fblogin');
        $res= $this->mod->fb_login($Email,$Name,$Password);

        if($res=='admin')
            {
                header("location:admin_welcome.php");
            }
        else{ 
            
                header("location:welcome.php");
            }

    }

    public function d_post($id){

        $res= $this->mod->d_post($id);
        header("location:own_post.php");
    }

    public function users(){

        $res= $this->mod->users();
        return $res;
    }

    public function pending(){

        $res= $this->mod->pending();
        return $res;
        
    }
    public function a_post($id){

        $res= $this->mod->a_post($id);
        return $res;
    }

    public function not_a_post($id){

        $res= $this->mod->not_a_post($id);
        echo "<script type='text/javascript'>alert('Done');</script>";
        header("location:p_requests.php");
    }

    public function r_post($cat,$qsn,$uid,$dd){

        $res= $this->mod->r_post($cat,$qsn,$uid,$dd);
        if($res)
        {
            echo "Your post sent for approval";
        }
    }

    public function ban($id){

        $res= $this->mod->ban($id);
        echo "<script type='text/javascript'>alert('Done');</script>";
        //header("location:users.php");   
    }

    public function admin($id){

        $res= $this->mod->admin($id);
        echo "<script type='text/javascript'>alert('Done');</script>";
        //header("location:users.php"); 
    }


}
?>