<?php 
  $file = fopen('webdict.txt', 'r');
  while(!feof($file)) {
    echo fgetc($file);
  }

  fclose($file);
  echo "<br>File closed"
?>