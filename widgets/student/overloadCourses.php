<h1>Overload Course</h1>


          <h2>Offered Courses</h2>
          <?php
          $con = mysql_connect("localhost","root","") or die('Could not connect: ' . mysql_error());
          mysql_select_db("dbms", $con);
          $sql="SELECT * FROM course";/* WHERE sid='".$_SESSION['username']."' AND flag=1";*/
          $result=mysql_query($sql,$con) or die ( mysql_error() );
          $row = mysql_fetch_array($result);

          echo '<table id="offered-courses">
          <thead>
            <tr>
              <th scope="col" abbr="Configurations" class="nobg">Course Id</th>
              <th scope="col">Course Name</th>
              <th scope="col">Credits</th>
              <th scope="col">Type</th>
   
              <th scope="col">Instructor</th>
              <th scope="col">Program</th>
          </tr>
          </thead>
          <tbody>';

          
          if (!$row)
          {
              echo "<tr><td>-</td></tr>";
          } 
          else
          {
            while($row)
            {
/*              $sql2="SELECT * FROM course WHERE cid=".$row['cid'].";";
              $result2=mysql_query($sql2,$con);
              $row2 = mysql_fetch_array($result2);
       
              while($row2)
              {*/
                  echo "<tr>";
                  echo "<td>" . $row['cid'] . "</td>";
                  echo "<td>" . $row['cname'] . "</td>";
                  echo "<td>" . $row['credits'] . "</td>";
                  echo "<td>" . $row['type'] . "</td>";
       
                  echo "<td>" . $row['iname'] . "</td>";
                  echo "<td>" . $row['program'] . "</td>";
                  echo "</tr>";
/*                  $row2 = mysql_fetch_array($result2);
              }*/
              $row = mysql_fetch_array($result);
            }
            echo "</tbody>
            </table>";
          }
          mysql_close($con);
      ?>


<form id="course-overload-form" action="controller/overloadCourse.php" method="post" class="styled-form">
    <p>Insert all the details about the course which you want to take as overload. Refer to the table below for the course-ids</p>
    <p id="form-error" class="form-error"></p>
    <label for="cid">Course ID</label>
    <input id="cid" type="text" name="cid" value="" />
    <label for="application">Your Application</label>
    <textarea id="application" type="text" name="application" value=""></textarea>
    <button type="submit" name="course-add-submit">Apply</button>
</form>

  <script type='text/javascript'>
    $(document).ready(function() {
        $('#offered-courses').dataTable();
        $('#course-overload-form').submit(function(e) {
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
