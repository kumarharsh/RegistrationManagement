<?php
    $sql="SELECT cid FROM enrollment WHERE sid='".$_POST['$roll']."' and flag=1";
    $result=mysql_query($sql,$con);
    $row = mysql_fetch_array($result);

   else
    {
        while($row)
        {
            $cid = $row['cid'];
			$query = "SELECT cid,cname FROM course WHERE cid='".$cid."'";
			$res = mysql_query($query,$con);
			$row1 = mysql_fetch_array($res);
			
            $response = array();
            $response[] = array("cid" => $row1['cid'], "cname" => $row1['cname']);

            $row = mysql_fetch_array($result);
        }
    }
    $response["status"] = "error";
    $response["message"] = "The username and password do not match";
    header('Content-type: application/json');
    echo json_encode($response);
?>
