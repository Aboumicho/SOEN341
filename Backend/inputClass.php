<?php
require_once("includedFunctions.php");
//-----------CREATE A CONNECTION TO THE DATABASE
$database = new SQLite3('myDatabase.db');



//------------GRAB  USER INPUT
    $username = "";
    $courseName = "";
    $credits = "";
    $grade = "";

    //------------HANDLE LOGOUT BUTTON
    if(isset($_POST["logout"]))
    {
        redirect_to("index.php?");
    }


    //------------HANDLE SUBMIT BUTTON
    if(isset($_POST["submit"]))
    {

        $courseName = $_POST["courseName"];
        $credits = $_POST["credits"];
        $grade = $_POST["grade"];
        $username = $_POST["username"];

        //---------------BASIC INPUT VALIDATION
        if(empty($courseName))
        {
            redirect_to("successfulLogin.php?username=$username&message=No Course Name Entered. Please Try Again");
        }
        if(empty($credits))
        {
            redirect_to("successfulLogin.php?username=$username&message=No Credits Entered. Please Try Again");
        }
        if(!is_numeric($credits))
        {
            redirect_to("successfulLogin.php?username=$username&message=Credits Must Be a Numeric Value. Please Try Again.");

        }


        //CREATE A QUERY TO ADD NEW VALUES TO DATABASE
        $query = "INSERT INTO courses (course_name, course_credits, course_grade, student_username)
                  VALUES ('$courseName','$credits', '$grade', '$username')";


        $database->exec($query);

    }

redirect_to("successfulLogin.php?username=$username");
?>