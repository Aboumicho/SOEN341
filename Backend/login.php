<!DOCTYPE html>
<html>

<head>
<title>Login Page</title>
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

    <h2 id="login" class="message">
        <?php

            if(empty($_GET["message"]))
            {
                $mainMessage = "Welcome! Please Log in.";
            }
            else
            {
                $mainMessage = $_GET["message"];
            }
            echo $mainMessage;

        ?>
    </h2>

<!-- Form with two text inputs and a submit button -->

    <form name="loginUserForm" id="loginUserForm" action="processLogin.php" method="post">

        <br/>
        <label for="username">Username: </label>
        <input type="text" name="username" id="username" class="inputBoxes" value=""/><br/><br/>


        <label for="password">Password: </label>
        <input type="text" name="password" id="password" class="inputBoxes" value=""/><br/>

        <br/>
        <input type="submit" name="submit" id="submit" value="Submit"/>


    </form>

</body>
</html>