<h1>Drop Courses</h1>
<?php
    $con = mysql_connect("localhost","root","") or die('Could not connect: ' . mysql_error());

    mysql_select_db("dbms", $con);
    $sql="SELECT * FROM enrollment WHERE sid='".$_SESSION['username']."' AND flag=1";
    $result=mysql_query($sql,$con) or die ( mysql_error() );
    $row = mysql_fetch_array($result);
    
    if (!$row)
    {
        echo "No course has been added yet ..!!";
    } 
    else
    {
        echo '<form id=\'student-drop-form\' action=\'controller/dropCourse.php\' method=\'post\' class=\'styled-form stretch\'>
            <p class="form-error" id="form-error"></p>
        <table id="courses">
        <thead>
          <tr>
            <th scope="col" abbr="Configurations" class="nobg">Course Id</th>
            <th scope="col">Course Name</th>
            <th scope="col">Credits</th>
            <th scope="col">Type</th>

            <th scope="col">Instructor</th>
            <th scope="col">Program</th>
            <th scope="col">Drop?</th>			
        </tr>
        </thead>
        <tbody>';
      while($row)
      {
        $sql2="SELECT * FROM course WHERE cid=".$row['cid'].";";
        $result2=mysql_query($sql2,$con);
        $row2 = mysql_fetch_array($result2);

        while($row2)
        {
            echo "<tr>";
            echo "<td>" . $row2['cid'] . "</td>";
            echo "<td>" . $row2['cname'] . "</td>";
            echo "<td>" . $row2['credits'] . "</td>";
            echo "<td>" . $row2['type'] . "</td>";

            echo "<td>" . $row2['iname'] . "</td>";
            echo "<td>" . $row2['program'] . "</td>";
			echo "<td><input type='radio' name='drop' id='drop' value=" . $row2['cid'] . " /></td>";
            echo "</tr>";
            $row2 = mysql_fetch_array($result2);
        }
        $row = mysql_fetch_array($result);
      }
      echo "</tbody>
      </table>
      <button type='submit' name='course-drop-submit'>Drop</button>
      </form>";
    }
    mysql_close($con);
?>

  <script type='text/javascript'>
    $(document).ready(function() {
        $('#courses').dataTable();

        $('#student-drop-form').submit(function(e) {
            $("#form-error").html(' ').hide();
            e.preventDefault();
            var postUrl = $(this).attr("action");
            var request = $.ajax({
                type: 'POST',
                url: postUrl,
                data: $(this).serialize()
            })
            request.done(function(response) {
                if(response.status=='error') {
                  $("#form-error").show().html(response.message);
                }
                else {
                    alert(response.message);
                    window.location.reload();
                }
            });
        });

    });
  </script>
