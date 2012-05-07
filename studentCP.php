<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!-->

<?php
    session_start();
    if( (!isset( $_SESSION[ 'username' ] )) || ($_SESSION[ 'type' ] != "student") )
    {
	    echo "Sorry. You do not have enough authorization to access this level. Redirecting you to back to the home page.";
        header("Location: index.php");
    }
?>

<html id="courseReg" class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">

  <!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/b/378 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Student's Portal : LNMIIT Course Registration</title>
  <meta name="description" content="This is a module for course registration to be used by the institute administration to offer the students with an easy and intutive way of registering for their courses."/>
  <meta name="author" content="Kumar Harsh, Anoop Malav, Pankaj Singhal">

  <!-- Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
  <link rel="shortcut icon" type="image/ico" href="favicon.ico" />
 
  <!-- include the stylesheets to be used on the page --> 
  <?php include("css/main.css"); ?>
  <link rel="stylesheet" href="css/navbar.css"/>
  <link rel="stylesheet" href="css/nivo-slider.css"/>
  <link rel="stylesheet" href="css/nivo-default-theme.css"/>
  <link rel="stylesheet" href="css/jquery.checkbox.css"/>
  <link rel="stylesheet" href="css/jquery.dataTables.css"/>
  <!-- end CSS-->


  <!-- All JavaScript at the bottom, except for Modernizr / Respond.
       Modernizr enables HTML5 elements & feature detects; Respond is a polyfill for min/max-width CSS3 Media Queries
       For optimal performance, use a custom Modernizr build: www.modernizr.com/download/ -->
  <script src="js/modernizr-2.0.6.min.js"></script>
</head>

<body>
  <div id="wrapper">
    <header>
      <div class="container_24"> 
        <?php include('widgets/header.php'); ?>
        <?php include('widgets/topnav-student.php'); ?>
      </div>
    </header>

    <div id="main" class="container_24" role="main">

      <aside id="main-sidebar">
        <h1>Welcome, <?php  $id=$_SESSION[ 'username' ];
							    $con = mysql_connect("localhost","root","");
								if (!$con)
								{
								  die('Could not connect: ' . mysql_error());
								}
								
								mysql_select_db("dbms", $con);
									
								$sql="select * from student where username='$id'" ;
								$result=mysql_query($sql);
								$row = mysql_fetch_array($result); 
								echo $row['fname'];
								mysql_close($con);
						 ?></h1>
        <h3>Today is <span id="todayDate"></h3>
        
        <section id="control-panel">
        <h2>Current Stage going on:</h2>
        
          <h3 id="current-stage">
          <?php
            include ('controller/stageCodes.php');
            $conf = fopen('controller/processStage.conf','r');
            fseek($conf, -1, SEEK_END);
            $cs = fgetc($conf);
            if($cs)
				echo $stageNames[$cs];
			else
				echo "Currently no process is going on..";
            fclose($conf);
          ?>
          </h3>
        </section>
      </aside>

      <section id="content">
          <h1>Welcome To Student Module</h1>
          <p>You can activate the different stages of the registration process, and also view and approve requests from students</p>
        
          <h2>Your Courses</h2>
          <?php
          $con = mysql_connect("localhost","root","") or die('Could not connect: ' . mysql_error());
          mysql_select_db("dbms", $con);
          $sql="SELECT * FROM enrollment WHERE sid='".$_SESSION['username']."' AND flag=1";
          $result=mysql_query($sql,$con) or die ( mysql_error() );
          $row = mysql_fetch_array($result);

          echo '<table id="courses">
          <thead>
            <tr>
              <th scope="col" abbr="Configurations" class="nobg">Course Id</th>
              <th scope="col">Course Name</th>
              <th scope="col">Credits</th>
              <th scope="col">Type</th>
   
              <th scope="col">Instructor</th>
              <th scope="col">Program</th>
          </tr>
          </thead>
          <tbody>';

          
          if (!$row)
          {
              echo "<tr><td>-</td></tr>";
          } 
          else
          {
            while($row)
            {
              $sql2="SELECT * FROM course WHERE cid=".$row['cid'].";";
              $result2=mysql_query($sql2,$con);
              $row2 = mysql_fetch_array($result2);
       
              while($row2)
              {
                  echo "<tr>";
                  echo "<td>" . $row2['cid'] . "</td>";
                  echo "<td>" . $row2['cname'] . "</td>";
                  echo "<td>" . $row2['credits'] . "</td>";
                  echo "<td>" . $row2['type'] . "</td>";
       
                  echo "<td>" . $row2['iname'] . "</td>";
                  echo "<td>" . $row2['program'] . "</td>";
                  echo "</tr>";
                  $row2 = mysql_fetch_array($result2);
              }
              $row = mysql_fetch_array($result);
            }
            echo "</tbody>
            </table>";
          }
          mysql_close($con);
      ?>

      </section>
      <footer>
         <?php include("widgets/footer.php"); ?> 
      </footer>
    </div>
  </div>


  <!-- JavaScript at the bottom for fast page loading -->
  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<!-- 
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>
 -->
  <script type="text/javascript" src="js/modernizr-2.0.6.min.js"></script>
  <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.18.min.js"></script>

  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type='text/javascript' src='js/jquery.checkbox.min.js'></script>
  <script type='text/javascript'>
    $(window).load(function() {
        $('#todayDate').text(getToday());
        $('form.switches input:radio').checkbox();
        $('form.switches input:radio:nth(<?php echo $cs-1 ?>)').attr('checked','checked');
        $('#courses').dataTable();

        $('#form-stage').submit(function(e) {
          e.preventDefault();
          var postUrl = $(this).attr('action');
          var request = $.ajax({
            type: 'POST',
            url: postUrl,
            data: $(this).serialize(),
            beforeSend: function() {
              return confirm('Start a new stage?');
            }
          })
          request.done(function(response) {
            if(response.status=='success') {
              $('#current-stage').html(response.stage);
            }
            else {
              alert(response.message);
            }
          });
        });
    });
  </script>
  <script type='text/javascript'>
    function getToday() {
      var currentTime = new Date();
      var month = currentTime.getMonth() + 1;
      var day = currentTime.getDate();
      var year = currentTime.getFullYear();
      return day + '/' + month + '/' + year;
    }
  </script>
?>

  <!-- end scripts-->
  

  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->

</body>
</html>
