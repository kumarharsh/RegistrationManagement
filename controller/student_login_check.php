<?php
    session_start();
    if( (!isset( $_SESSION[ 'username' ] )) || ($_SESSION[ 'username' ] == "dean") )
    {
        echo "You are not authorized...";
        exit;
    }
?>
<?php
    $con = mysql_connect("localhost","root","");
    if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }

    mysql_select_db("dbms", $con);

    $sql="SELECT name FROM session WHERE flag=1";
    $result=mysql_query($sql,$con);
    $row = mysql_fetch_array($result);

    /* Replacing the if-else ladder with switch statement.
        if something goes wrong, it will be because the $row[name] is not set.
        if this happens, then uncomment the following lines: 

    if(!$row)
    {
        echo "<p>Currently no process is going on.</p>";
    }
    */
    switch($row[name])
    {
        case "registration" : header("Location: ../student_registration.php");
            break;
        case "add" : header("Location: ../student_add.php");
            break;
        case "drop" : header("Location: ../student_drop.php");
            break;
        case "overload" : header("Location: ../student_overload.php");
            break;
        default:    echo "<p>";
                    echo "Currently no process is going on .....";
                    echo "</p>";
    }
    mysql_close($con)
    <a href="logout.php">logout</a>
?>
