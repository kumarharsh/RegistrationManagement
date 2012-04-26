<?php
    $con = mysql_connect("localhost","root","");
    if (!$con)
    {
        die('Could not connect:\n'.mysql_error());
    }

    mysql_select_db("dbms", $con);
    $sql="SELECT * FROM dean WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'";
    $result=mysql_query($sql,$con);
    $row = mysql_fetch_array($result);
    $loginType = "none";
    if ($row)
    {
        session_start();
        $_SESSION[ 'username' ] = $_POST['username'];
        /* if a record is found, login as DEAN and redirect */
        $response = array("status" => "success", "access" => "deanCP.php");
        header('Content-type: application/json');
        echo json_encode($response);
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
        $response = array("status" => "success", "access" => "facultyCP.php");
        header('Content-type: application/json');
        echo json_encode($response);
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
        $response = array("status" => "success", "access" => "studentCP.php");
        header('Content-type: application/json');
        echo json_encode($response);
        exit();
    }
    mysql_close($con);
    

    // Return Error if none of the above logins succeed.
    $response["status"] = "error";
    $response["message"] = "The username and password do not match";
    header('Content-type: application/json');
    echo json_encode($response);

?>
