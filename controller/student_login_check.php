<?php

session_start();

if( (!isset( $_SESSION[ 'username' ] )) || ($_SESSION[ 'username' ] == "dean") )
{
	echo "You are not authorized...";
	
	exit;
}

?>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("dbms", $con);

  $sql="select name from session where flag=1";
  $result=mysql_query($sql,$con);
  $row = mysql_fetch_array($result);
  if(!$row)
  {echo '<font class="fonttype">';
  echo "Currently no process is going on .....";
  echo "</font>";
  }
  else if($row[name]=='registration')
  {
	  header('Location: ../student_registration.php');
  }
  else if($row[name]=='add')
  {
	  header('Location: ../student_add.php');
  }
  else if($row[name]=='drop')
  {
	  header('Location: ../student_drop.php');
  }
  else if($row[name]=='overload')
  {
	  header('Location: ../student_overload.php');
  }
  mysql_close($con)
  
  ?>
  <a href="logout.php">logout</a>