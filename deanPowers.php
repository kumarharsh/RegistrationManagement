<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!-->

<?php
    session_start();
    if( (!isset( $_SESSION[ 'username' ] )) || ($_SESSION[ 'username' ] != "dean") )
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
  <title>Dean's Portal : LNMIIT Course Registration</title>
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
        <?php include('widgets/topnav-dean.php'); ?>
      </div>
    </header>

    <div id="main" class="container_24" role="main">

      <aside id="main-sidebar">
        <h1>Welcome, Mr. Singh</h1>
        <h3>Today is <span id="todayDate"></h3>
        
        <section id="control-panel">
        <h2>Current Stage</h2>
        
          <h3 id="current-stage">
          <?php
            include ('controller/stageCodes.php');
            $conf = fopen('controller/processStage.conf','r');
            fseek($conf, -1, SEEK_END);
            $cs = fgetc($conf);
            echo $stageNames[$cs];
            fclose($conf);
          ?>
          </h3>

            <form id="form-stage" class="switches" method="post" action="controller/switchStage.php">
                <p><label><input name="stage" value="1" type="radio">Registration</label></p>
                <p><label><input name="stage" value="2" type="radio">Drop</label></p>
                <p><label><input name="stage" value="3" type="radio">Add</label></p>
                <p><label><input name="stage" value="4" type="radio">Overload</label></p>
                <button type="submit" name="switch-stage">Set</button>
            </form>
        </section>
      </aside>

      <?php
        if(!isset($_REQUEST['view']) || $_REQUEST['view']=="home")
          header('deanCP.php');
        else if($_REQUEST['view']=="courses")
          include('widgets/dean/viewCourses.php');
      ?>
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

  <script type='text/javascript' src='js/jquery.checkbox.min.js'></script>
  <script type='text/javascript'>
    $(window).load(function() {
        $('#todayDate').text(getToday());
        $('form.switches input:radio').checkbox();
        $('form.switches input:radio:nth(<?php echo $cs-1 ?>)').attr('checked','checked');

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
