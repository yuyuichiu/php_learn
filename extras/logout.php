<?php
  session_start();

  session_destroy();
  header("Location: /phpCrashCourse/05_session.php")
?>