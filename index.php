<?php
  // set default timezone to Sydney, Australia
  date_default_timezone_set('Australia/Sydney');
  
  // get the date
  $date = getdate();
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="container">
    <header>
      <h1>Calendar</h1>
    </header>
    <div class="month-spacer"></div>
    <div class="month"><h2><?php echo $date['month']; ?><h2></div>
    <div class="month-spacer"></div>
    <?php

      // display day labels
      $daynames = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
      foreach ($daynames as $item) {
        echo '<div class="dayname"><h3>'.$item.'</h3></div>';
      }

      // get number of days for current month
      $days = date('t');

      // get name of first day of month
      $firstday = date('l', strtotime('first day of this month'));
      
      // lookup key for corresponding day name
      $key = array_keys($daynames, $firstday);

      // initiliase counter to offset grid start day
      $x = 1 - $key['0'];
      $y = date('t', mktime(0,0,0, date('n') - 1)) - $key['0'];

      // display days of month as grid items
      while ($x <= $days) {
        if ($x > 0) {
          if ($x == $date['mday']) {
            echo '<div class="currentday"><h4>'.$x.'</h4></div>';
          } else {
            echo '<div class="day"><h4>'.$x.'</h4></div>';
          }  
        } else {
          $y++;
          echo '<div class="empty"><h4>'.$y.'</h4></div>';
        }
        $x++;
      }

      // Add empty spaces to end of calendar grid section
      $y = 1;

      while ($x <= (35-$key['0'])) {
        echo '<div class="empty"><h4>'.$y.'</h4></div>';
        $x++;
        $y++;
      }
    ?>
    <footer>
      <p>Footer goes here</p>
    </footer>
  </body>

</html>