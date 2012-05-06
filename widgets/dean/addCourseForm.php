<h1>Add Course</h1>
<form id="course-add-form" action="controller/addCourse.php" method="post" class="styled-form">
    <p>Fill in the form to add a new course</p>
    <p class="form-error"></p>
    <label for="cid">Course ID</label>
    <input id="cid" type="text" name="cid" value="" />
    <label for="cname">Course Name</label>
    <input id="cname" type="text" name="cname" value="" />
    <label for="credits">Credits</label>
    <input id="credits" type="text" name="credits" value="" />
    <label for="type">Type of Course</label>
    <input id="type" type="text" name="type" value="" />
    <label for="faculty">Instructor Name</label>
    <input id="faculty" type="text" name="faculty" value="" />
    <label for="max">Max Seats</label>
    <input id="max" type="text" name="max" value="" />

    <label>Program</label>
    <label>Undergraduate<input type="checkbox" name="program" value="ug"/></label>
    <label>Postgraduate<input type="checkbox" name="program" value="pg"/></label>


    
    
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
                  $('#course-info').dataTable( response.data ).show();
                  $('#course-name').html(response.name).show();
                }
            });
        });
    });
  </script>
