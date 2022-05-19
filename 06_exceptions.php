<?php
  function division($x) {
    if($x === 0) {
      throw new Exception('Division by zero.');
    }

    return "You divided 1 by " . $x . " and the result is " . 1/$x . "<br>";
  }

  try {
    // Code that triggers an error will stop subsequent code from running
    echo division(2);
    echo division(0);
    echo division(9); // does not run
    echo division(3);
    echo division(0);
  }
  catch (Exception $e) {
    // $e is an object, e->getMessage() is using method within an object
    echo "Error: " . $e->getMessage() . "<br>";
  }
  finally {
    echo "--Ending message, generated in a finally block--";
  }
?>