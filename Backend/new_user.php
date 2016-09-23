<!DOCTYPE html>
<html>

<head>
<title>New User</title>
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
    <h2 class="message">
        <?php
            if(empty($_GET["message"]))
            {
                $mainMessage = "Welcome";
            }
            else
            {
                $mainMessage = $_GET["message"];
            }
            echo $mainMessage;
        ?>
    </h2>

<!-- Form with two text inputs and a submit button -->

    <form name="newUserForm" id="newUserForm" action="processNewUser.php" method="post">


        <label for="username"><pre>Please enter your desired username:</pre> </label>
        <input type="text" name="new_username" id="new_username" class="inputBoxes" value=""/><br/>


        <label for="password"><pre>Please enter a password:</pre> </label>
        <input type="text" name="new_password" id="new_password" class="inputBoxes" value=""/><br/>

        <br/>
        <input type="submit" name="create" id="submit3"value="Submit"/>


    </form>


</body>
</html>