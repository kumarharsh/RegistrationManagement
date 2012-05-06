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
    <label for="max_seat">Max Seats</label>
    <input id="max_seat" type="text" name="max_seat" value="" />

    <label>Program</label>
    <label><input type="checkbox" name="program[]" value="UG"/>Undergraduate</label>
    <label><input type="checkbox" name="program[]" value="PG"/>Postgraduate</label>
    <button type="submit" name="course-add-submit">Add</button>
</form>

  <script type='text/javascript'>
    $(document).ready(function() {
        $('#course-add-form').submit(function(e) {
            e.preventDefault();
            var postUrl = $(this).attr("action");
            var request = $.ajax({
                type: 'POST',
                url: postUrl,
                data: $(this).serialize()
            })
            request.done(function(response) {
                console.log(response);
                if(response.status=='error') {
                  $(".form-error").show().html(response.message);
                }
                else {
                  alert(response.message);
                }
            });
        });
    });
  </script>
