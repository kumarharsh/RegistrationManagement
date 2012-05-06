<?php
    $con = mysql_connect("localhost","root","") or die('Could not connect: ' . mysql_error());
    mysql_select_db("dbms", $con);
    $sql="SELECT cid FROM enrollment WHERE sid='".$_POST['roll']."' and flag=1";
    $result=mysql_query($sql,$con);
    $row = mysql_fetch_array($result);

    if(!$row)
    {
        $response = array("status" => "error", "message" => "no records exist");
    }
    else
    {
        $response["status"] = "success";
        $aaData = array();
        while($row)
        {
            $cid = $row['cid'];
			$query = "SELECT cid,cname FROM course WHERE cid='".$cid."'";
			$res = mysql_query($query,$con);
			$row1 = mysql_fetch_array($res);
			
            $aaData[] = array($row1['cid'], $row1['cname']);

            $row = mysql_fetch_array($result);
        }
        $response["data"] = array("aaData" => $aaData);
    }
    header('Content-type: application/json');
    echo json_encode($response);
?>
