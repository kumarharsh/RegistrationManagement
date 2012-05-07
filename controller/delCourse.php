<?php 
    $i=0;
    foreach( $_POST['delete'] as $k)
    {
        $a[$i]=$k;
        $i=$i+1;
    }
    $i=$i-1;
    $con = mysql_connect("localhost","root","");
    if (!$con)
    {
        $response["status"] = "error";
        $response["message"] = "Could not connect to database";
        header('Content-type: application/json');
        echo json_encode($response);
    }
    mysql_select_db("dbms", $con);
    for($j=0; $j<=$i; $j++)
    {   
        $sql="DELETE FROM course WHERE cid='$a[$j]'" ;
        if (!mysql_query($sql,$con))
        {
            $response["status"] = "error";
            $response["message"] = "Could not delete the courses";
            header('Content-type: application/json');
            echo json_encode($response);
        }
        else {
            $response["status"] = "Success";
            $response["message"] = "The selected courses have been deleted";
            header('Content-type: application/json');
            echo json_encode($response);
        }
    }

?>
