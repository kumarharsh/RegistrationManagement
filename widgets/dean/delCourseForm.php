<h1>Delete Course</h1>
<form id="course-list-form" action="controller/listAllCourses.php" method="post" class="styled-form">
<button type="submit" name="course-list-button">Load</button>
</form>

<form id="course-del-form" action="controller/delCourse.php" method="post" class="styled-form stretch">
    <p>Choose the courses you want to delete</p>
    <p id="form-delete-error" class="form-error"></p>
    <table id="course-list">
        <thead>
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Credits</th>
                <th>Type</th>
                <th>Faculty</th>
                <th>Program</th>
                <th>Maximum Seats</th>
                <th>Available Seats</th>
                <th>Delete?</th>
            </th>
        <thead>
    </table>
    <button type="submit" name="course-del-submit">Delete</button>
</form>

  <script type='text/javascript'>
    $(document).ready(function() {
        $('#course-del-form').hide();
        $('#course-list-form').submit(function(e) {
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
                  $('#course-list').dataTable(response.data);
                  $('#course-del-form').show();
                }
            });
        });

        $('#course-del-form').submit(function(e) {
            $("#form-delete-error").html(' ').hide();
            e.preventDefault();
            var postUrl = $(this).attr("action");
            var request = $.ajax({
                type: 'POST',
                url: postUrl,
                data: $(this).serialize()
            })
            request.done(function(response) {
                if(response.status=='error') {
                  $("#form-delete-error").show().html(response.message);
                }
                else {
                  alert(response.message);
                  window.location.reload();
                }
            });
        });
    });
  </script>
