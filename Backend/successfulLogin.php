<?php

//-------------CONNECT TO THE DATABASE
    $database = new SQLite3('myDatabase.db');


//-------------FILTER LIST OF COURSE INFO IN DATABASE USING USER LOGIN NAME.

    $username = $_GET["username"];



//-------------PERFORM A DATABASE QUERY NOW THAT WE ARE CONNECTED
    $query= "SELECT * FROM courses WHERE student_username ='$username'";
    $result = $database->query($query);

    if(!$result)
    {
        die("Database Query Failed");
    }

?>





<!DOCTYPE html>
<html>

<head>
    <title>Successful Login</title>
    <meta charset="UTF-8">
    <meta name="description" content ="GPA Web Calculator">
    <meta name="author" content ="Mike Basdeo">
    <meta name="keywords" content="GPA, Web, Calculator">
    <link rel="stylesheet" type="text/css" href="mystyle.css"/>
</head>

<body>
    <br/>
    <a href="index.php">GPA Web-Calculator<br/>Mike Basdeo - 6788815</a>
    <br/><br/>

    <h1 class="message">
        <?php
            if(empty($_GET["message"]))
            {
                $mainMessage = "Successful Login";
            }
            else
            {
                $mainMessage = $_GET["message"];
            }
            echo $mainMessage;
        ?>
    </h1>


    <form name="inputClass" id="inputClass" action="inputClass.php" method="post">

        <!--This hidden type feels like a terrible way to do this but it works...-->
        <input type="hidden" name="username" id="username" value="<?php echo $username ?>"/>

        <br/>
        <label for="courseName">Class  : </label>
        <input type="text" name="courseName" id="courseName" class="inputBoxes" value=""/><br/><br/>

        <label for="credits"> Credits: </label>
        <input type="text" name="credits" id="credits" class="inputBoxes" value=""/><br/><br/>

        <label for="grade">Grade: </label>
        <select name="grade" id="grade" default="">
            <option value=4.30>A+</option>
            <option value=4.00>A</option>
            <option value=3.70>A-</option>
            <option value=3.30>B+</option>
            <option value=3.00>B</option>
            <option value=2.70>B-</option>
            <option value=2.30>C+</option>
            <option value=2.00>C</option>
            <option value=1.70>C-</option>
            <option value=1.30>D+</option>
            <option value=1.00>D</option>
            <option value=0.70>D-</option>
            <option value=0>F</option>
            <option value=0>FNS</option>
            <option value=0>R</option>
            <option value=0>(NR)</option>
        </select>
        <br/>
        <br/>
        <input type="submit" name="submit" id="submit2"value="Input New Class"/>
        <input type="submit" name="logout" id="logout"value="Log Out"/>
    </form>


    <?php
        //------COMPLICATED TABLE BUILDING AND GPA CALCULATING IN A LOOP

        echo "<br/>";
        echo "<table id=\"mainTable\" border=\"5\">";
        echo "<tr>";
        echo "<td>Course Name</td>";
        echo "<td>Credits</td>";
        echo "<td>Grade</td>";
        echo "</tr>";

        $creditHours = 0;
        $gradePoints = 0;
        $gpa = 0;

        while ($row = $result->fetchArray())
        {
            $deleteID = $row["id"];


            $creditHours = $creditHours + ($row["course_credits"]);
            $gradePoints = $gradePoints + ($row["course_credits"] * $row["course_grade"]);
            $gpa = $gradePoints / $creditHours;

            echo "<tr>";
            echo "<td>" . $row["course_name"] ."</td>";
            echo "<td>" . $row["course_credits"] ."</td>";
            echo "<td>" . $row["course_grade"] ."</td>";?>
             <form name="deleteClass" id="deleteClass" action="deleteClass.php" method="post">
                            <input type="hidden" name="deleteID" id="deleteID" value="<?php echo $deleteID ?>"/>
                             <input type="hidden" name="username" id="username" value="<?php echo $username ?>"/>
                        <td>
                            <button type="submit" name="delete" id="delete">Delete</button>

                        </td>
             </form>
            </tr>
        <?php
        }
        echo "</table>";
    ?>


    <h1 id="gpa">

        <?php
            if(empty($gpa))
            {
                echo "Your GPA will be displayed here";
            }
            else
            {
                echo "Your GPA is: " . number_format($gpa,2) ;
            }
        ?>

    </h1>



</body>
</html>
