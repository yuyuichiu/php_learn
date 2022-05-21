<?php
  // https://www.codewars.com/kata/537e18b6147aa838f600001b/train/php
  header('Content-Type: text/plain');

  // To create text align justify effect
  function justify(string $str, int $len): string {
    // First, split string into chunks
    $result = "";
    $temp_len = 0;
    $chunks = [[]];
    $iter = 0;
    $rawWords = explode(" ", $str);
    
    for($i = 0; $i < count($rawWords); $i++) {
      $temp_len += strlen($rawWords[$i]);
      if($temp_len > $len) {
        $iter++;
        $chunks[$iter] = array();
        $temp_len = 0 + strlen($rawWords[$i]);
      } 

      array_push($chunks[$iter], $rawWords[$i]);
      $temp_len += 1;
    }

    // Give each line appropriate spacing
    $chunkIter = 0;
    foreach($chunks as $c) {
      $chunkIter++;

      // get raw word count
      $rawCharCount = 0;
      foreach($c as $word) {
        $rawCharCount += strlen($word);
      }

      // build a space array to store spacing information
      $spaces = [];
      for($i = 0; $i < count($c); $i++) {
        array_push($spaces, 0);
      }

      // adjust spacing until char count matches required line width
      $totalChars = $rawCharCount + array_sum($spaces);
      $iter = 0;
      while($totalChars < $len && count($c) > 1) {
        $spaces[$iter]++;
        $iter++;
        if($iter > count($c)-2) {
          $iter = 0;
        }
        $totalChars = $rawCharCount + array_sum($spaces);
      }

      // Process raw word and spacing into a sentence
      // IMPORTANT: last row should not be justified
      for($i = 0; $i < count($c); $i++) {
        if($chunkIter !== count($chunks)) {
          $result = $result . $c[$i] . str_repeat(" ", $spaces[$i]);
        } else {
          $result = $result . $c[$i] . " ";
        }
      }
      $result = $result . "\n";
    }

    return trim($result);
  }

  $sample = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sagittis dolor mauris, at elementum ligula tempor eget. In quis rhoncus nunc, at aliquet orci. Fusce at dolor sit amet felis suscipit tristique. Nam a imperdiet tellus. Nulla eu vestibulum urna. Vivamus tincidunt suscipit enim, nec ultrices nisi volutpat ac. Maecenas sit amet lacinia arcu, non dictum justo. Donec sed quam vel risus faucibus euismod. Suspendisse rhoncus rhoncus felis at fermentum. Donec lorem magna, ultricies a nunc sit amet, blandit fringilla nunc. In vestibulum velit ac felis rhoncus pellentesque. Mauris at tellus enim. Aliquam eleifend tempus dapibus. Pellentesque commodo, nisi sit amet hendrerit fringilla, ante odio porta lacus, ut elementum justo nulla et dolor.";
  echo(justify($sample, 40));
?>