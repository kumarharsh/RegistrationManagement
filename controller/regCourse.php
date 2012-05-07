<?php
    session_start();
    $id = $_SESSION['username'];
    $course=$_POST['add'];
    $con = mysql_connect("localhost","root","");
    if (!$con)
    {
      die('Could not connect: ' . mysql_error());
    }

    mysql_select_db("dbms", $con);
    $sql="select * from enrollment where cid='$course' and sid='$id' and flag=1";
    $result=mysql_query($sql);
    $row = mysql_fetch_array($result); 
    if($row)
    {
        $response["status"] = "error";
        $response["message"] = "You have already registered for this course";
        header('Content-type: application/json');
        echo json_encode($response);
    }
    else {
        $sql="select avai_seat from course where cid='$course'";
        $result=mysql_query($sql);
        $row = mysql_fetch_array($result); 
        if($row['avai_seat']!=0)
        {
            $sql="select cid from enrollment where sid='$id' and flag=1";
            $result2=mysql_query($sql);
            $row2= mysql_fetch_array($result2);
            $sum=0;
            while($row2)
            {
                $z=$row2['cid'];
                $sql="select credits from course where cid='$z'";
                $result3=mysql_query($sql);
                $row3= mysql_fetch_array($result3);
                $sum=$sum+$row3['credits'];
                $row2= mysql_fetch_array($result2);
            }
            $sql="select credits from course where cid='$course'";
            $result4=mysql_query($sql);
            $row4= mysql_fetch_array($result4);
            $sum=$sum+$row4['credits'];
            
            if($sum>24)
            {
                $response["status"] = "error";
                $response["message"] = "You have exceeded your credit limit. You can not add any more courses.";
                header('Content-type: application/json');
                echo json_encode($response);
            }
            else
            {
                $sql="insert into enrollment (sid,cid,flag) values('$id','$course',1)";
                $result=mysql_query($sql);
                $sql="update course set avai_seat=avai_seat-1 where cid='$course'";
                $result=mysql_query($sql);

                $response["status"] = "success";
                $response["message"] = "The course has been successfuly registered for you";
                header('Content-type: application/json');
                echo json_encode($response);
            }
        }
        else
        {
            $response["status"] = "error";
            $response["message"] = "All seats for this course have been filled.";
            header('Content-type: application/json');
            echo json_encode($response);
        }
    }
    mysql_close($con);
?>
