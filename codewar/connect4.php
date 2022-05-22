<?php
  // https://www.codewars.com/kata/56882731514ec3ec3d000009/train/php
  function whoIsWinner(array $piecesPositionList) : string {
    // $board[row][col]
    $steps = 0;
    $board = [
      [0,0,0,0,0,0,0],
      [0,0,0,0,0,0,0],
      [0,0,0,0,0,0,0],
      [0,0,0,0,0,0,0],
      [0,0,0,0,0,0,0],
      [0,0,0,0,0,0,0],
    ];

    foreach($piecesPositionList as $move) {
      $steps++;
      // Update the board
      $col = strtoupper(ord(substr($move, 0, 1))) - 65;
      $color = substr($move, 2);

      for($row = 6-1; $row >= 0; $row--){
        if($board[$row][$col] === 0 || $row === 0) {
          $board[$row][$col] = $color;
          break;
        }
      }

      // Navigate the board cell by cell to check for win condition
      if($steps >= 4) {
        for($row = 0; $row < 6; $row++) {
          for($col = 0; $col < 7; $col++) {
            if(checkWinCondition($row, $col, $board)) {
              return checkWinCondition($row, $col, $board);
            }
          }
        }
      }
    }

    // All moves done and no one won, return draw
    return "Draw";
  }

  // Return winner if any, else return null
  function checkWinCondition($row, $col, $board) {
    // Check for 8 directions
    $offsetX = [0,1,1,1,0,-1,-1,-1];
    $offsetY = [1,1,0,-1,-1,-1,0,1];

    for($i = 0; $i < 8; $i++) {
      $n1 = $board[$row][$col];
      $n2 = $board[$row + $offsetX[$i]][$col + $offsetY[$i]];
      $n3 = $board[$row + $offsetX[$i] * 2][$col + $offsetY[$i] * 2];
      $n4 = $board[$row + $offsetX[$i] * 3][$col + $offsetY[$i] * 3];

      $winner = checkLine($n1, $n2, $n3, $n4);
      if($winner) {
        return $winner;
      }
    }
  }

  function checkLine($n1, $n2, $n3, $n4) {
    if(!$n1 || !$n2 || !$n3 || !$n4) {
      return null;
    }
    if($n1 !== 0 && $n2 !== 0 && $n3 !== 0 && $n4 !== 0) {
      if($n1 === $n2 && $n2 === $n3 && $n3 === $n4) {
        return $n1;
      }
    }
    return null;
  }

  $piecesPositionList  = [
    "C_Yellow", "E_Red", "G_Yellow", "B_Red",
    "D_Yellow", "B_Red", "B_Yellow", "G_Red",
    "C_Yellow", "C_Red", "D_Yellow", "F_Red",
    "E_Yellow", "A_Red", "A_Yellow", "G_Red",
    "A_Yellow", "F_Red", "F_Yellow", "D_Red",
    "B_Yellow", "E_Red", "D_Yellow", "A_Red",
    "G_Yellow", "D_Red", "D_Yellow", "C_Red"
  ];

  echo whoIsWinner($piecesPositionList);
?>