<?php
    session_start();
    $id = $_SESSION['username'];
    $con = mysql_connect("localhost","root","");
    if (!$con)
    {
      die('Could not connect: ' . mysql_error());
    }
    $id=$_SESSION[ 'username' ];
    $course=$_POST['drop'];

    mysql_select_db("dbms", $con);
    $sql="delete from enrollment where sid='$id' and cid='$course' and flag=1";
    $result=mysql_query($sql);
    $sql="update course set avai_seat=avai_seat+1 where cid='$course'";
    $result=mysql_query($sql);

    $response["status"] = "Success";
    $response["message"] = "The course has been dropped";
    header('Content-type: application/json');
    echo json_encode($response);

    mysql_close($con);
?>
