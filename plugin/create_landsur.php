<?php
include("../includes/dbconfig.php");

if(isset($_POST['email']))
{

    $userProperties = [
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ];
    

   
    $auth = $firebase->createAuth();

    // $user = $auth->createUserWithEmailAndPassword($_POST['email'], $_POST['password']);

    // $user = $auth->getUserByEmail($_POST['email']);


    // update_rec($userProperties,$user);
}


?>
