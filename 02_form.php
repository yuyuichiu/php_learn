<?php
  function processInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if(!empty($_POST)) {
    // Sanitize input to defend against malicious input
    $username = processInput($_POST['name']);
    $userAge = processInput($_POST['age']);

    echo "Name: " . $username . ". Age: " . $userAge . "<br>";
  }
  
  date_default_timezone_set("Asia/Hong_Kong");
  echo readfile("webdict.txt");
?>

<html>
  <body>
    <h1>02 - FORM</h1>
    <p>Today is <?php echo date('Y-m-d (l) h:ia') ?></p>
    <form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> method='POST'>
    Name: <input type="text" name="name"><br>
    Age: <input type="text" name="age"><br>
    <input type="submit">
    </form>

    <?php include 'footer.php'; ?>
  </body>
</html>