<?php 
  session_start();

  if(isset($_SESSION['username'])) {
    echo "<h1>Welcome " . $_SESSION['username'] . ".</h1>";
    echo "<a href='/phpCrashCourse/extras/logout.php'>Logout</a>";
  } else {
    echo "<h1>Welcome Guest, please login</h1>";
    echo "<a href='/phpCrashCourse/05_session.php'>Go Back</a>";
  }
?>