<?php
  session_start();
  date_default_timezone_set("Asia/Hong_Kong");


?>

<html>
  <body>
    <h1>02 - FORM</h1>
    <p>Today is <?php echo date('Y-m-d (l) h:ia') ?></p>
    <form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> method='POST'>
    username: <input type="text" name="username" autofocus><br>
    password: <input type="password" name="password"><br>
    <input type="submit">
    </form>

    <?php include 'footer.php'; ?>
  </body>
</html>