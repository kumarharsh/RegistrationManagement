<?php
    session_start();
    session_destroy();
?>
<html>
<body>User Logged Out. Redirecting to the home page</body>
<?php
    header("Location:../index.php");
?>
</html>

