<?php
  // https://www.codewars.com/kata/521c2db8ddc89b9b7a0000c1/train/php

  function snail(array $array) {    
    if($array[0] == []) { return "Empty"; }
    $board = [...$array];

    $result = [];
    $xLength = count($array[0]) - 1;
    $yLength = count($array) - 1;
    // a cursor to navigate through the board
    $cursor = array('y'=>0, 'x'=>0);
    // offset of 4 different directions, RIGHT->DOWN->LEFT->UP
    $offset = array(['y'=>0, 'x'=>1], ['y'=>1, 'x'=>0], ['y'=>0, 'x'=>-1], ['y'=>-1, 'x'=>0]);
    $directionIdx = 0;
    // Max loop = (2 * (n-1)) + 1
    $max_loop = 2 * $yLength + 1;

    // While turning point is not blocked, loop
    while($directionIdx < $max_loop) {
      // Check if current position is valid (Not meeting "X" block / out of array)
      // If meet invalid block, turn direction
      if(
        $cursor['x'] > $xLength || $cursor['x'] < 0 ||
        $cursor['y'] > $yLength || $cursor['y'] < 0 ||
        $board[$cursor['y']][$cursor['x']] === "X"
      ) {
        // INVALID - move direction
        // Move cursor from last valid position to next block by updated direction
        $cursor['x'] = $cursor['x'] - $offset[$directionIdx % 4]['x'];
        $cursor['y'] = $cursor['y'] - $offset[$directionIdx % 4]['y'];
        $directionIdx++;
        $cursor['x'] = $cursor['x'] + $offset[$directionIdx % 4]['x'];
        $cursor['y'] = $cursor['y'] + $offset[$directionIdx % 4]['y'];
      } else {
        // VALID - read and record
        // Read and record item to result, mark read block with "X"
        array_push($result, $board[$cursor['y']][$cursor['x']]);
        $board[$cursor['y']][$cursor['x']] = "X";

        // Move cursor by direction toward next block
        $cursor['x'] = $cursor['x'] + $offset[$directionIdx % 4]['x'];
        $cursor['y'] = $cursor['y'] + $offset[$directionIdx % 4]['y'];
      }
    }

    return $result;
  }

  print_r(snail([[1,2,3,4,5], [6,7,8,9,10], [11,12,13,14,15], [16,17,18,19,20], [21,22,23,24,25]]));
?>