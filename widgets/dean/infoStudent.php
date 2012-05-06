<h1>Student Info</h1>
<form id="student-info-form" action="controller/showStudentInfo.php" method="post" class="styled-form">
    <p>Enter the roll number of the desired student:</p>
    <p class="form-error"></p>
    <label for="roll">User ID</label>
    <input id="roll" type="text" name="roll" value="" />
    <button type="submit" name="student-info-submit">View</button>
</form>

<table id="student-info">
    <thead>
        <tr>
            <th>Course ID</th>
            <th>Course Name</th>
        </th>
    <thead>
</table>

  <script type='text/javascript'>
    $(document).ready(function() {
        $('#student-info').hide();
        $('#student-info-form').submit(function(e) {
            e.preventDefault();
            var postUrl = $(this).attr("action");
            var request = $.ajax({
                type: 'POST',
                url: postUrl,
                data: $(this).serialize()
            })
            request.done(function(response) {
                if(response.status=='error') {
                    alert(response.message);
                }
                else {
                  $('#student-info').dataTable( response.data ).show();
                }
            });
        });
    });
  </script>
