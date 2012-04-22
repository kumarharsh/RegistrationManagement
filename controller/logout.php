<?php
session_start();
session_destroy();
?>
<html>
<body>User Logged Out</body>
<?php
sleep(1);
header("Location:index.html");
?>
</html>

