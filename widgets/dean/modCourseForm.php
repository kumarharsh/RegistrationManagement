<h1>Modify Course</h1>
<form id="course-list-form" action="controller/listAllCoursesMod.php" method="post" class="styled-form">
<button type="submit" name="course-list-button">Load</button>
</form>

<form id="course-mod-form" action="controller/modCourse.php" method="post" class="styled-form stretch">
    <p>Choose the course you want to modify</p>
    <p id="form-modify-error" class="form-error"></p>
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
                <th>Modify</th>
            </th>
        <thead>
    </table>
    <button type="submit" name="course-mod-submit">Modify</button>
    
    <div id="modify-form-holder"></div>
</form>

  <script type='text/javascript'>
    $(document).ready(function() {
        $('#course-mod-form').hide();
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
                  $('#course-mod-form').show();
                }
            });
        });

        $('#course-mod-form').submit(function(e) {
            $("#form-modify-error").html(' ').hide();
//            e.preventDefault();
            var postUrl = $(this).attr("action");
            var request = $.ajax({
                type: 'POST',
                url: postUrl,
                data: $(this).serialize()
            })
            request.done(function(response) {
                if(response.status=='error') {
                  $("#form-modify-error").show().html(response.message);
                }
                else {
                    $("#modify-form-holder").html('widgets/dean/addCourse.php');
                }
            });
        });
    });
  </script>
