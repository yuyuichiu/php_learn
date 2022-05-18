<?php
  // Session is set on server
  session_start();

  if(isset($_POST['submit'])) {
    // Don't sanitize password
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    if($username == 'john' && $password == 'password') {
      // Create a session
      $_SESSION['username'] = $username;
      // Redirect in PHP
      header('Location: /phpCrashCourse/extras/dashboard.php');
    } else {
      echo "Incorrect Authentication Information.";
    }
  }
?>

<html>
  <body>
    <h1>05 - Session</h1>
    <p>To test the function, username is "john" and password is "password"</p>
    <p><?php echo session_save_path(); ?></p>
    <form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> method='POST'>
    Username: <input type="text" name="username" autofocus><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" name='submit' value='submit'>
    </form>

    <?php include 'footer.php'; ?>
    <script>
      // localStorage
      localStorage.setItem('name', 'Bob in localStorage');
      // session storage
      sessionStorage.setItem('name', 'Bob in session')
      // Cookie
      document.cookie('name=Dave; expires=' + new Date(2023, 0, 1).toUTCString())
      
    </script>
  </body>
</html>