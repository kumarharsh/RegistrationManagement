<nav id="nav-container-outer" class="grid_21 prefix_3">
   <ul id="nav-container" class="nav-container">
      <li><a class="item-primary" href="deanCP.php">Home</a></li>

      <li><a class="item-primary" href="deanCP.php?view=courses">View Courses</a></li>

      <li><a class="item-primary" href="#">View Info</a>
         <ul style="width:150px;">
             <li><a href="deanCP.php?view=info&sort=Student">Student-wise</a></li>
             <li><a href="deanCP.php?view=info&sort=Course">Course-wise</a></li>
         </ul>
      </li>

      <li><a href="alter.php" class="item-primary">Alter Courses</a>
        <ul style="width:150px">
          <li><a href="deanCP.php?view=alter&mode=add">Add Courses</a></li>
          <li><a href="deanCP.php?view=alter&mode=mod">Modify Courses</a></li>
          <li><a href="deanCP.php?view=alter&mode=del">Delete Courses</a></li>
        </ul>
      </li>

      <li><a class="item-primary" href="deanCP.php?view=overload">Approve Overload</a></li>
      <li><a class="item-primary" href="controller/logout.php">Logout</a></li>
    </ul>   
</nav>
