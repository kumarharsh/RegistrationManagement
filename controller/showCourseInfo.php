<?php
    $id = $_POST['cid'];
    $con = mysql_connect("localhost","root","") or die('Could not connect: ' . mysql_error());
    mysql_select_db("dbms", $con);
    $sql="SELECT sid FROM enrollment WHERE cid='".$id."' and flag=1";
    $result=mysql_query($sql,$con);
    $row = mysql_fetch_array($result);

    if(!$row)
    {
        $response = array("status" => "error", "message" => "no records exist");
    }
    else
    {
        $response["status"] = "success";
        $name = mysql_fetch_array(mysql_query("SELECT  `cname` FROM  `course` WHERE  `cid` = '".$id."'"));
        $response["name"] = $name["cname"];
        $aaData = array();
        while($row)
        {
            $sid = $row['sid'];
			$query = "SELECT username,fname FROM student WHERE username='".$sid."'";
			$res = mysql_query($query,$con) or die (mysql_error());
			$row1 = mysql_fetch_array($res);
			
            $aaData[] = array($row1['username'], $row1['fname']);

            $row = mysql_fetch_array($result);
        }
        $response["data"] = array("aaData" => $aaData);
    }
    header('Content-type: application/json');
    echo json_encode($response);
?>
