<?php 
    $i=0;
    $a[0]=0;
    $a[1]=0;
    foreach($_POST['program'] as $k)
    {
        $a[$i]=$k;
        $i=$i+1;
    }
    $i=$i-1;
    $program=0;
    if(($a[0]=="UG") and (is_numeric($a[1])))
        $program='UG';
    else if(($a[0]=="PG") and (is_numeric($a[1])))
        $program='PG';
    else
        $program='UG/PG';

    $con = mysql_connect("localhost","root","");
    $request = array();
    if (!$con)
    {
        $response["status"] = "error";
        $response["message"] = "Could not connect to database";
        header('Content-type: application/json');
        echo json_encode($response);
    }
    if( $_POST["cid"] == "" || $_POST["cname"] == "" || $_POST["faculty"] == "" || $_POST["credits"] == "" )
    {
        $response["status"] = "error";
        $response["message"] = "Please complete the fields in the form.";
        header('Content-type: application/json');
        echo json_encode($response);
    }
        

    mysql_select_db("dbms", $con);
    $sql="INSERT INTO course (cid, cname,credits,type,iname,program,max_seat,avai_seat) VALUES ('$_POST[cid]','$_POST[cname]','$_POST[credits]','$_POST[type]','$_POST[faculty]','$program','$_POST[max_seat]','$_POST[max_seat]')";
    if (!mysql_query($sql,$con))
    {
        $response["status"] = "error";
        $response["message"] = "Error in adding course to the database. A course with that ID already exists";
        header('Content-type: application/json');
        echo json_encode($response);
    }
    else
    {
        $response["status"] = "success";
        $response["message"] = "Congrats. The course has been successfully added";
        header('Content-type: application/json');
        echo json_encode($response);
    }
?>
