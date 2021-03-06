<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!-->
<html id="courseReg" class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">

  <!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/b/378 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>LNMIIT Course Registration</title>
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

      <section id="content">
        <h1>About The Website</h1>
        <p>This website is a prototype-version of a course registration management system, which can be implemented in an educational institute. The website offers a 3-way functionality: the faculty can float courses, the students can view and select the courses of their choice, and the administration, or Dean, maintains a bird's eye view of the whole process and gets to approve special academic cases.</p>
        <p>The website is made in PHP/HTML5 with AJAX. The website has been made as easy to use as possible for all the three parties.</p> 
        <h1>About Us</h1>
        <p>The team comprises of 
            <ul>
                <li>Kumar Harsh (y08uc072)</li>
                <li>Anoop Malav (y08uc029)</li>
                <li>Pankaj Singhal (y09uc105)</li>
                <li>Gaurav Jain</li>
                <li>Gaurav Singh</li>
            </ul>
        All of us are students of LNMIIT, and this project is made as a compulsory part of the Software Engineering course held in Spring Semester, 2012.
        </p>
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
            var postUrl = $(this).attr("action");
            var request = $.ajax({
                type: 'POST',
                url: postUrl,
                data: $(this).serialize()
            })
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
