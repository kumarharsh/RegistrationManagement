<h1>Course Info</h1>
<form id="course-info-form" action="controller/showCourseInfo.php" method="post" class="styled-form">
    <p>Enter the course ID of the desired course:</p>
    <p class="form-error"></p>
    <label for="cid">Course ID</label>
    <input id="cid" type="text" name="cid" value="" />
    <button type="submit" name="course-info-submit">View</button>
</form>
<h2 id="course-name"></h2>
<table id="course-info">
    <thead>
        <tr>
            <th>Student ID</th>
            <th>Student Name</th>
        </th>
    <thead>
</table>

  <script type='text/javascript'>
    $(document).ready(function() {
        $('#course-info').hide();
        $('#course-name').hide();
        $('#course-info-form').submit(function(e) {
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
                    $('#course-name').html(response.name).show();
                    $('#course-info').dataTable().fnDestroy();
                    $('#course-info').dataTable(response.data).show();
                    $('#course-info').css("width","100%");  // to fix the weird bug that makes the table of width 148px
                }
            });
        });
    });
  </script>
