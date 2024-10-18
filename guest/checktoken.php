<?php
require_once("../includes/initialize.php");

 
    
    $uname = trim($_POST['username']);
    $upass = trim($_POST['password']);
    
    $h_upass = sha1($upass);
    //check if the email and password is equal to nothing or null then it will show message box
    if ($uname == '' OR $upass == '') {

	echo "Nom d'utilisateur et mot de passe incorrectes";
    }else{
    	 $guest = new Guest();
        $res = $guest::guest_login($uname,$h_upass);

        if ($res==true){
           redirect("index.php");
        }else{
         echo "Nom d'utilisateur et mot de passe incorrectes";
            
        }
    }




?>
