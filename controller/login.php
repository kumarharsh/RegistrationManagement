<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("dbms", $con);
$sql="SELECT * FROM dean WHERE username='".$_POST['username']."' and password='".$_POST['password']."'";
$result=mysql_query($sql,$con);
$row = mysql_fetch_array($result);
$a=0;
if (!$row)
  {
  //echo "INCORRECT USER ID OR PASSWORD .    . <a href=\"dean_login.php\">Retry</a>";
 // header("Location:index.html");
 $a=1;
  }
  else{
  //echo "Login Successfull!! .    . <a href=\"dean_workspace.php\">Continue.......</a>"; 
    session_start();
  $_SESSION[ 'username' ] = $_POST['username'];
  header("Location:dean_home.php");
  }
  if($a==1)
  {
	  	$sql1="SELECT * FROM student WHERE username='".$_POST['username']."' and password='".$_POST['password']."'";
		$result1=mysql_query($sql1,$con);
		$row1 = mysql_fetch_array($result1);
		if (!$row1)
		  {
		  //echo "INCORRECT USER ID OR PASSWORD .    . <a href=\"student_login.php\">Retry</a>";
		  header("Location:index.html");
		  }
		  else{
		  //echo "Login Successfull!! .    . <a href=\"student_workspace.php\">Continue.......</a>";
		  session_start();
		  $_SESSION[ 'username' ] = $_POST['username'];
		  header("Location:student_login_check.php");
		  }
  }
  mysql_close($con)
?>
