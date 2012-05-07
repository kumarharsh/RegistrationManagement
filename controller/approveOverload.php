<?php 
 
  $con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("dbms", $con);
$sql="Select * from overload";
$result=mysql_query($sql,$con);
$row = mysql_fetch_array($result);
while($row)
{
	$q=$row['rid'];
	if(isset($_POST[$q]) && $_POST[$q]=="approve")
	{	
		$x=$row['sid'];
		$y=$row['cid'];
		$sql="insert into enrollment (sid,cid,flag) values('$x','$y',1)";
		$result=mysql_query($sql,$con);
		$sql="delete from overload where rid=$q";
		$result=mysql_query($sql,$con);
		$sql="Select * from overload";
        $result=mysql_query($sql,$con);
        $row = mysql_fetch_array($result);
	}
	else if(isset($_POST[$q]) && $_POST[$q]=="reject")
	{	$sql="delete from overload where rid=$q";
		$result=mysql_query($sql,$con);
		$sql="Select * from overload";
        $result=mysql_query($sql,$con);
        $row = mysql_fetch_array($result);
	}
	else
	{
        $row = mysql_fetch_array($result);
    }
}

$response["status"] = "success";
$response["message"] = "Done";
header('Content-type: application/json');
echo json_encode($response);

mysql_close($con);

?>
