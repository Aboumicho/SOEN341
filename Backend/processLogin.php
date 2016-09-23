<?php
    require_once("includedFunctions.php");
    session_start();
    $file = './userList.txt';


//------------GRAB NEW USER INPUT

    $password = "";
    $username = "";

    if(isset($_POST["submit"]))
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
    }
    else
    {
        $message = "There were some errors";
    }



    if(empty($username))
    {
        redirect_to("login.php?message=No Username Entered. Please Try Again.");
    }




//------GET LIST OF ALL USERS FROM FILE
    $oldUserList = unserialize(file_get_contents($file));


//------CHECK FOR CORRECT LOGIN IN ALL USER NAMES
    foreach($oldUserList as $x => $x_value)
    {

        if ($x == $username && $x_value == $password)
        {
                redirect_to("successfulLogin.php?username=$username");
        }
    }

//-------RETURN TO LOGIN PAGE IF USERNAME/PASSWORD DOES NOT MATCH

    redirect_to("login.php?message=Incorrect username or password");

?>