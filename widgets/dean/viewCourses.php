<h1>Offered Courses</h1>
<?php
    $con = mysql_connect("localhost","root","") or die('Could not connect: ' . mysql_error());

    mysql_select_db("dbms", $con);
    $sql="SELECT * FROM course";
    $result=mysql_query($sql,$con);
    $row = mysql_fetch_array($result);
    if (!$row)
    {
        echo "No course has been added yet ..!!";
    } 
    else
    {
        echo '<table id="courses">
        <thead>
          <tr>
            <th scope="col" abbr="Configurations" class="nobg">Course Id</th>
            <th scope="col">Course Name</th>
            <th scope="col">Credits</th>
            <th scope="col">Type</th>

            <th scope="col">Instructor</th>
            <th scope="col">Program</th>
            <th scope="col">Maximum number of seats</th>
            <th scope="col">Available Seats</th>
        </tr>
        </thead>
        <tbody>';
        while($row)
        {
            echo "<tr>";
            echo "<td>" . $row['cid'] . "</td>";
            echo "<td>" . $row['cname'] . "</td>";
            echo "<td>" . $row['credits'] . "</td>";
            echo "<td>" . $row['type'] . "</td>";

            echo "<td>" . $row['iname'] . "</td>";
            echo "<td>" . $row['program'] . "</td>";
            echo "<td>" . $row['max_seat'] . "</td>";
            echo "<td>" . $row['avai_seat'] . "</td>";
            echo "</tr>";
            $row = mysql_fetch_array($result);
        }
        echo "</tbody>
        </table>";
    }
    mysql_close($con);
?>

  <script type='text/javascript'>
    $(document).ready(function() {
        $('#courses').dataTable();
    });
  </script>
