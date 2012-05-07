<?php 
    $con = mysql_connect("localhost","root","");
    $request = array();
    if (!$con)
    {
        $response["status"] = "error";
        $response["message"] = "Could not connect to database";
        header('Content-type: application/json');
        echo json_encode($response);
    }

    mysql_select_db("dbms", $con);
    $sql="SELECT * FROM course";
    $result=mysql_query($sql,$con);
    $row = mysql_fetch_array($result);


    if(!$row)
    {
        $response = array("status" => "error", "message" => "no records exist");
    }
    else
    {
        $response["status"] = "success";
        $aaData = array();
        while($row)
        {
            $q=$row['cid'];
            $aaData[] = array($row['cid']!=""?$row['cid']:"-",              $row['cname']!=""?$row['cname']:"-",
                                $row['credits']!=""?$row['credits']:"-",    $row['type']!=""?$row['type']:"-",
                                $row['iname']!=""?$row['iname']:"-",        $row['program']!=""?$row['program']:"-",
                                $row['max_seat']!=""?$row['max_seat']:"-",  $row['avai_seat']!=""?$row['avai_seat']:"-",
                                "<input type='radio' name='modify[]' id='modify[]' value='".$row['cid']."' />");
            $row = mysql_fetch_array($result);
        }
        $response["data"] = array("aaData" => $aaData);
    }
    header('Content-type: application/json');
    echo json_encode($response);


?>
