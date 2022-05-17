<?php
  // Associative Array, aka JS Objects
  $employeeAge = array('Ben' => 35, 'Dave' => 21, 'Joseph' => 60);

  ksort($employeeAge);
  foreach($employeeAge as $e => $age) {
    echo "Employee $e is now $age years old <br/>";
  }

  // Multidimensional Associative Array (Object)
  $products = array();

  $products['orange'] = array(
    'category' => 'fruits',
    'inventory' => array(
      'inStock' => 10,
      'sold' => 30
    )
  );

  $products['apple'] = array(
    'category' => 'fruits',
    'inventory' => array(
      'inStock' => 40,
      'sold' => 60
    )
  );

  echo "We sold " . $products['apple']['inventory']['sold'] . " apples.";
  // Run PHP with php -S localhost:8000 -t ./
?>