<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php

session_start();

if( (!isset( $_SESSION[ 'username' ] )) || ($_SESSION[ 'username' ] == "dean") )
{
	echo "You are not authorized...";
	
	exit;
}

?>
<?php 
$id=$_SESSION[ 'username' ];
  //echo $id;
     $con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("dbms", $con);
	
$sql="select sname from student where username='$id'" ;
$result=mysql_query($sql);
$row = mysql_fetch_array($result); 
mysql_close($con);


?>

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Course Registration Module</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
<link href="menu.css" rel="stylesheet" type="text/css" />
<link href="table.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
#footer #legal {
	text-align: center;
	bottom: auto;
}
-->
</style>
</head>
<body>
<div id="header">
	<div id="logo">
		<h1><a href="http://www.lnmiit.ac.in">The LNMIIT</a></h1>
		<h2>Course Registration</a></h2>
	</div>
	<div id="menu_edit">
		<ul class="pureCssMenu pureCssMenum0">
	<li class="pureCssMenui0"><a class="pureCssMenui0" href="student_login_check.php" title="">Homepage</a></li>
    	<li class="pureCssMenui0"><a class="pureCssMenui0" href="student_view_details.php" title="">View registration details</a></li>

<li class="pureCssMenui0"></li>
<li class="pureCssMenui0"></li>
<li class="pureCssMenui0"></li>
<li class="pureCssMenui0"></li>
<li class="pureCssMenui0"></li>
	<li class="pureCssMenui0"><a class="pureCssMenui0" href="logout.php">Logout</a></li>
</ul>
	</div>
</div>
<div id="wrapper">
	<div id="content">
		<div id="sidebar">
			<div id="support"></div>
            
			<div id="login" class="boxed">
			  <h1 class="title">Login Successful</h1>
				<div class="content">Welcome <?php echo $row['sname']; ?></div>
		  </div>
          <div class="date"><script language="JavaScript">
				<!--
				var currentTime = new Date()
				var month = currentTime.getMonth() + 1
				var day = currentTime.getDate()
				var year = currentTime.getFullYear()
				document.write(day + "-" + month+ "-" + year)
				//-->
				</script></div>
			
	  </div>
        
<div id="main">
		  <div id="welcome" class="post">
				<h2 class="title">Welcome to the Registration Module.</h2>
                
		  </div>
			
			  <h2 class="title">
              
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
	  header('Location: student_registration.php');
  }
  else if($row[name]=='add')
  {
	  header('Location: student_add.php');
  }
  else if($row[name]=='drop')
  {
	  header('Location: student_drop.php');
  }
  else if($row[name]=='overload')
  {
	  header('Location: student_overload.php');
  }
  mysql_close($con)
  
  ?>
			
		</div>
	</div>
   
	<div style="clear: both;">&nbsp;
      <p>&nbsp;</p>
    </div>
</div>
    <div style="height:150px ; width:100% ; background:#000" >

     </div>
<div id="footer">
	<p id="legal" align="center" > Copyright &copy; 2012 LNMIIT. All Rights Reserved.</p>
</div>
</body>
</html>
