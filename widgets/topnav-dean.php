<nav id="nav-container-outer" class="grid_21 prefix_3">
   <ul id="nav-container" class="nav-container">
      <li><a class="item-primary" href="index.php">Home</a></li>

      <li><a class="item-primary" href="#">View Courses</a></li>

      <li><a class="item-primary" href="#">View Info</a>
         <ul style="width:150px;">
             <li><a href="viewInfo.php?sort=Student">Student-wise</a></li>
             <li><a href="viewInfo.php?sort=Course">Course-wise</a></li>
         </ul>
      </li>

      <li><a href="alter.php" class="item-primary">Alter Courses</a>
        <ul style="width:150px">
          <li><a href="alter.php?mode=add">Add Courses</a></li>
          <li><a href="alter.php?mode=mod">Modify Courses</a></li>
          <li><a href="alter.php?mode=del">Delete Courses</a></li>
        </ul>
      </li>

      <li><a href="process.php" class="item-primary">Processes</a>
        <ul style="width:150px">
          <li><a href="process.php?mode=reg">Start Registration Stage</a></li>
          <li><a href="process.php?mode=drop">Start Drop Stage</a></li>
          <li><a href="process.php?mode=add">Start Add Stage</a></li>
          <li><a href="process.php?mode=over">Start Overload Stage</a></li>
        </ul>
      </li>

      <li><a class="item-primary" href="approveOverload.php">Approve Overload</a></li>
      <li><a class="item-primary" href="controller/logout.php">Logout</a></li>
    </ul>   
</nav>
