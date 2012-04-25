<?php
    session_start();
    if( (!isset( $_SESSION[ 'username' ] )) || ($_SESSION[ 'username' ] != "dean") )
    {
	    echo "You are not authorized...";
        exit(0);
    }
?>

<?php
    $con = mysql_connect("localhost","root","");
    if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("dbms", $con);
	
    $sql="select flag FROM session WHERE name='registration'" ;
    $result=mysql_query($sql);
    $row = mysql_fetch_array($result);
    $reg=$row['flag'];

    $sql="select flag FROM session WHERE name='drop'" ;
    $result=mysql_query($sql);
    $row = mysql_fetch_array($result);
    $drop=$row['flag'];


    $sql="select flag FROM session WHERE name='add'" ;
    $result=mysql_query($sql);
    $row = mysql_fetch_array($result);
    $add=$row['flag'];


    $sql="select flag FROM session WHERE name='overload'" ;
    $result=mysql_query($sql);
    $row = mysql_fetch_array($result);
    $overload=$row['flag'];

    //echo $reg;
    //echo $drop;
    //echo $add;
    //echo $overload;
    $print="";
    if($reg==1)
    {
        $print="REGISTRATION PROCESS IS GOING ON";
    }
    else if($drop==1)
    {
        $print="DROP PROCESS IS GOING ON";
    }
    else if($add==1)
    {
        $print="ADD PROCESS IS GOING ON";
    }
    else if($overload==1)
    {
        $print="OVERLOAD PROCESS IS GOING ON";
    }

        
    if($reg==0)
    {
        $reg1="start registration session";
    }
    else
    {
        $reg1="stop registration session";
    }
    if($drop==0)
    {
        $drop1="start drop session";
    }
    else
    {
        $drop1="stop drop session";
    }

    if($add==0)
    {
        $add1="start add session";
    }
    else
    {
        $add1="stop add session";
    }

    if($overload==0)
    {
        $overload1="start overload session";
    }
    else
    {
        $overload1="stop overload session";
    }

    mysql_close($con);


?>
<script>
function onreg()
{
	 var where_to= confirm("Are you sure..???");
 if (where_to== true)
 {
   window.location.href = "onreg.php";

 }
}</script>
<script>
function ondrop1()
{
	 var where_to= confirm("Are you sure..???");
 if (where_to== true)
 {
   window.location.href = "ondrop.php";

 }
}</script>
<script>
function onadd()
{
	 var where_to= confirm("Are you sure..???");
 if (where_to== true)
 {
   window.location.href = "onadd.php";

 }
}</script>
<script>
function onoverload()
{
	 var where_to= confirm("Are you sure..???");
 if (where_to== true)
 {
   window.location.href = "onoverload.php";

 }
}
</script>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Course Registration Module</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
<link href="menu.css" rel="stylesheet" type="text/css" />
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
		<h1><a href="www.lnmiit.ac.in">The LNMIIT</a></h1>
		<h2>Course Registration</a></h2>
	</div>
	<div id="menu_edit">
		<ul class="pureCssMenu pureCssMenum0">
	<li class="pureCssMenui0"><a class="pureCssMenui0" href="dean_home.php" title="">Homepage</a></li>
    <li class="pureCssMenui0"><a class="pureCssMenui0" href="dean_view_course.php" title="">View All Courses</a></li>
    <li class="pureCssMenui0"><a class="pureCssMenui0" href="#"><span>View Info.</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class="pureCssMenum">
		<li class="pureCssMenui"><a class="pureCssMenui" href="Info_stu.html"> Student wise</a></li>
		<li class="pureCssMenui"><a class="pureCssMenui" href="Info_cou.html"> Course wise</a></li>
	</ul>
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	<li class="pureCssMenui0"><a class="pureCssMenui0" href="#"><span>Alter Courses</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class="pureCssMenum">
		<li class="pureCssMenui"><a class="pureCssMenui" href="dean_add_course.php">Add Course</a></li>
        <li class="pureCssMenui"><a class="pureCssMenui" href="dean_modify_course.php">Modify Course</a></li>
        <li class="pureCssMenui"><a class="pureCssMenui" href="dean_delete_course.php">Delete Course</a></li>
	</ul>
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	<li class="pureCssMenui0"><a class="pureCssMenui0" href="#"><span>Start Process</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class="pureCssMenum">
		<li class="pureCssMenui"><a class="pureCssMenui" onClick="onreg()"> <?php echo $reg1; ?></a></li>
		<li class="pureCssMenui"><a class="pureCssMenui" onClick="ondrop1()"> <?php echo $drop1; ?></a></li>
		<li class="pureCssMenui"><a class="pureCssMenui" onClick="onadd()"> <?php echo $add1; ?></a></li>
		<li class="pureCssMenui"><a class="pureCssMenui" onClick="onoverload()"> <?php echo $overload1; ?></a></li>
	</ul>
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	<li class="pureCssMenui0"><a class="pureCssMenui0" href="approve_overload_request.php">Approve Overload</a></li>
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
				<div class="content">Welcome Mr. DEAN.</div>
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
              <h1 class="blinkytext">
                <?php echo $print ; ?>
                </h1>
              
			
		</div>
	</div>
   
	<div style="clear: both;">&nbsp;
      <p>&nbsp;</p>
    </div>
</div>
<div id="footer">
	<p id="legal" align="center" > Copyright &copy; 2012 LNMIIT. All Rights Reserved.</p>
</div>
</body>
</html>
