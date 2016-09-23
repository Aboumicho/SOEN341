<?php
require_once("includedFunctions.php");

//-----------CREATE A CONNECTION TO THE DATABASE
$database = new SQLite3('myDatabase.db');





//------------Create a query to delete from the database
    $username = "";
    $courseName = "";
    $credits = "";
    $grade = "";


    if(isset($_POST["delete"]))
    {
        $deleteNumber = $_POST["deleteID"];
        $username = $_POST["username"];
        $query = "DELETE FROM courses WHERE id= $deleteNumber";

        $database->exec($query);
    }

redirect_to("successfulLogin.php?username=$username");
?>