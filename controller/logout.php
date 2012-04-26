<?php
    /* destroy the session, and logout the user. Also, redirect him to the home page. */
    session_start();
    session_destroy();
    echo "User Logged Out. Redirecting to the home page.";
    header("Location:../index.php");
?>
