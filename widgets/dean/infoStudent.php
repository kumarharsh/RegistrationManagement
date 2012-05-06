<h1>Student Info</h1>
<p>Enter the roll number of the desired student:</p>
<form id="student-info-form" action="../../controller/studentInfo.php" method="post" class="styled-form">
    <p class="form-error"></p>
    <label for="roll">User ID</label>
    <input id="roll" type="text" name="roll" value="" />
    <button type="submit" name="student-info-submit">View</button>
</form>

  <script type='text/javascript'>
    $(document).ready(function() {
        $('#student-info').dataTable({
            "bProcessing": true,
            "sAjaxSource": $(this).attr("action");            
        });
    });
  </script>
