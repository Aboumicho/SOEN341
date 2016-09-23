<?php
   require_once("includedFunctions.php");
    session_start();
    $file = './userList.txt';


//------------GRAB NEW USER INPUT
    $new_password = "";
    $new_username = "";

    if(isset($_POST["create"]))
    {
        $new_username = $_POST["new_username"];
        $new_password = $_POST["new_password"];
    }
    else
    {
        $message = "There were some errors";
    }





//------GET LIST OF ALL USERS FROM FILE
    $oldUserList = unserialize(file_get_contents($file));


//------CHECK FOR UNIQUENESS IN ALL USER NAMES
    foreach($oldUserList as $x => $x_value)
    {

        //if a duplicate entry is detected, loop back to the new user page
        if ($x == $new_username)
        {
             session_unset();
            redirect_to("new_user.php?message=Name Already Taken Try Again");
        }

    }

    if(empty($new_password))
    {
        redirect_to("new_user.php?message=No password entered. Please Try Again.");
    }

//-------COMBINE THE NEW USER WITH THE OLD USERS AND STORE IN FILE

    $_SESSION[$new_username]=$new_password;
    $arrayToSend = array_merge($oldUserList,$_SESSION);
    $file = './userList.txt';
    file_put_contents($file, serialize($arrayToSend));

    //continue to successful creation page and let user login.
    redirect_to("login.php?message=New User Created! Now You Can Log in");



?>