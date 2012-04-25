<?php
    $con = mysql_connect("localhost","root","");
    if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }

    mysql_select_db("dbms", $con);
    $sql="SELECT * FROM dean WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'";
    $result=mysql_query($sql,$con);
    $row = mysql_fetch_array($result);
    if ($row)
    {
        /* if a record is found, login as DEAN and redirect */
        session_start();
        $_SESSION[ 'username' ] = $_POST['username'];
        header("Location:../dean_home.php");
        exit();
    }

    /* else, try if the user is a FACULTY, and if he actually is a faculty, then login and redirect to faculty page */
    $sql="SELECT * FROM faculty WHERE username='".$_POST['username']."' and password='".$_POST['password']."'";
    $result=mysql_query($sql,$con);
    $row = mysql_fetch_array($result);
    if($row)
    {
        session_start();
        $_SESSION[ 'username' ] = $_POST['username'];
        header("Location:../faculty_home.php");
        exit();
    }
 
    /* else, try the STUDENT database, and login as STUDENT if a record is found, and redirect to the student page */
    $sql="SELECT * FROM student WHERE username='".$_POST['username']."' and password='".$_POST['password']."'";
    $result=mysql_query($sql,$con);
    $row = mysql_fetch_array($result);
    if($row)
    {
        session_start();
        $_SESSION[ 'username' ] = $_POST['username'];
        header("Location:student_login_check.php");
        exit();
    }
    
    /* else redirect to the home page, and display an error */
    else
    {
        header("Location:index.php");
        exit();
    }
    mysql_close($con)
?>
