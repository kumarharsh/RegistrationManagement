<?php
    session_start();
    $id=$_SESSION[ 'username' ];
    $course=$_POST['cid'];
    $app=$_POST['application'];
    $con = mysql_connect("localhost","root","");
    if (!$con)
      {
      die('Could not connect: ' . mysql_error());
      }

    mysql_select_db("dbms", $con);
    $sql="select CPI from student where username='$id'" ;
    $result=mysql_query($sql);
    $row = mysql_fetch_array($result);
    if($row['CPI']<=5)
    {
        $response["message"] = "You are not allowed to take overload due to your LOW CPI";
        $response["status"] = "error";
        header('Content-type: application/json');
        echo json_encode($response);
    }
    else
    {
        $sql="insert into overload (sid,cid,application) values ('$id','$course','$app')" ;
        $result=mysql_query($sql);

        $response["message"] = "Your overload request has been forwarded to the dean for approval";
        $response["status"] = "success";
        header('Content-type: application/json');
        echo json_encode($response);
    }
?>
