<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!-->

<?php
    session_start();
    if( (isset( $_SESSION[ 'username' ] )) AND ($_SESSION[ 'username' ] == "dean") )
    {
	    //echo "Sorry. You do not have enough authorization to access this level. Redirecting you to back to the home page.";
        header("Location: dean.php");
    }
	if( (isset( $_SESSION[ 'username' ] )) AND ($_SESSION[ 'username' ] != "dean") )
    {
	    //echo "Sorry. You do not have enough authorization to access this level. Redirecting you to back to the home page.";
        header("Location: ./controller/student_login_check.php");
    }
?>


<html id="courseReg" class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">

  <!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/b/378 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>LNMIIT Course Registration</title>
  <meta name="description" content="This is a module for course registration to be used by the institute administration to offer the students with an easy and intutive way of registering for their courses."/>
  <meta name="author" content="Anoop Malav, Kumar Harsh, Pankaj Singhal, Gaurav Jain, Gaurav Singh">

  <!-- Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
  <link rel="shortcut icon" type="image/ico" href="favicon.ico" />
 
  <!-- include the stylesheets to be used on the page --> 
  <?php include("css/main.css"); ?>
  <link rel="stylesheet" href="css/navbar.css"/>
  <link rel="stylesheet" href="css/nivo-slider.css"/>
  <link rel="stylesheet" href="css/nivo-default-theme.css"/>
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
        <?php include('widgets/topnav.php'); ?>
      </div>
    </header>

    <div id="main" class="container_24" role="main">

      <figure id="presentationBox">
        <span id="slider-overlay-left"></span>
        <div id="slider" class="nivoSlider theme-default">
          <img src="css/images/campus-01.jpg" />
          <img src="css/images/campus-02.jpg" />
          <img src="css/images/campus-03.jpg" />
          <img src="css/images/campus-04.jpg" />
        </div>
        <span id="slider-overlay-right"></span>
      </figure>

      <aside id="main-sidebar">
        <h1>Login</h1>
        <form id="login-form" method="post" action="controller/logoin.php" class="styled-form">
              <p class="form-error"></p>
              <label for="username">User ID</label>
              <input id="username" type="text" name="username" value="" />
              <label for="password">Password</label>
              <input id="password" type="password" name="password" value="" />
              <button type="submit" name="loginSubmit">Login</button>
            <p><a href="#">Forgot your password?</a></p>
        </form>
      </aside>

      <section id="content">
        <h1>Welcome To Course Registration</h1>
        <p>Hello all. Here you are provided with the portal of online Course Registration of every semester in The LNMIIT. Hope you get all your desired & required Courses. :)</p>
        <h1>Vision</h1>
        <p>To establish a World class platform for creation, dissemination, and application of knowledge in the field of Information Technology through research, pedagogy, and consultation, as well as to become an effective catalyst for technological and societal development of the country through interactions with industries and academia.</p>
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
  <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
  <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
        $('#login-form').submit(function(e) {
            e.preventDefault();
            var postUrl = "controller/login.php";// $(this).attr("action");
            var request = $.ajax({
                type: "POST",
                url: postUrl,
                data: $(this).serialize(),
            })
            /*var request = $.ajax({
                type: "POST",
                url: postUrl,
                data: $(this).serialize(),
                dataType: "json"
            });*/
            request.done(function(response) {
                if(response.status==="success") {
                    window.location.href = response.access;
                }
                else {
                    $('.form-error').show().html(response.message);
                }            
            });
        });
    });
  </script>
  <!-- end scripts-->
	

  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->

</body>
</html>
