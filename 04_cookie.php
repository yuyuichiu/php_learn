<?php 
  // View cookies in dev tool > application > Cookie
  // setcookie(name, value, timeWhichExpires)
  setcookie('name', 'Olaf', time() + 86400);

  if(isset($_COOKIE['name'])) {
    echo "Cookie value: " . $_COOKIE['name'] . "<br>";
  } else {
    echo "Cookie is not set. <br>";
  }

  // Delete cookie by setting a new one that expires immediately
  setcookie('name', '' , time());
?>