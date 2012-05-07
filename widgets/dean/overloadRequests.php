<h1>Overload Requests</h1>

      <?php
      $con = mysql_connect("localhost","root","") or die('Could not connect: ' . mysql_error());
      mysql_select_db("dbms", $con);
        $sql="SELECT * FROM overload";
        $result=mysql_query($sql,$con);
        $row = mysql_fetch_array($result);
            
      if (!$row)
      {
          echo "No requests";
      } 
      else
      {
        echo '<form id=\'overload-req-form\' action=\'controller/approveOverload.php\' method=\'post\' class=\'styled-form stretch\'>
            <p class="form-error" id="form-error"></p>
        <table id="requests">
        <thead>
          <tr>
            <th scope="col">Student ID</th>
            <th scope="col">Course Name</th>
            <th scope="col">Application</th>
            <th scope="col">Approve</th>
            <th scope="col">Reject</th>
        </tr>
        </thead>
        <tbody>';
      while($row)
      {

        $q=$row['cid'];
        $z=$row['cid'];
        $sql="select cname from course where cid=$z";
        $result1=mysql_query($sql,$con);
        $row1 = mysql_fetch_array($result1);
        while($row1)
        {
            echo "<tr>";
            echo "<td>" . $row['sid'] . "</td>";
            echo "<td>" . $row1['cname'] . "</td>";
            echo "<td>" . $row['application'] . "</td>";
			echo "<td><input type='radio' value='Approve' id='req' name=" . $row['rid'] . " /></td>";
			echo "<td><input type='radio' value='Reject' id='req' name=" . $row['rid'] . " /></td>";
            echo "</tr>";
            $row1 = mysql_fetch_array($result1);
        }
        $row = mysql_fetch_array($result);
      }
      echo "</tbody>
      </table>
      <button type='submit' name='course-drop-submit' style='width:80px'>Approve</button>
      </form>";
      }
      mysql_close($con);
  ?>


  <script type='text/javascript'>
    $(document).ready(function() {
        $('#requests').dataTable();
        $('#overload-req-form').submit(function(e) {
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
