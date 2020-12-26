<?php
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
    <?php 
      // display day labels
      $daynames = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
      foreach ($daynames as $item) {
        echo '<div class="dayname"><h2>'.$item.'</h2></div>';
      }

      // get number of days for current month
      $days = date('t');

      // get name of first day of month
      $firstday = date('l', strtotime('first day of this month'));
      
      // lookup key for corresponding day name
      $key = array_keys($daynames, $firstday);

      // initiliase counter to offset grid start day
      $x = 1 - $key['0'];

      // display days of month as grid items
      while ($x <= $days) {
        if ($x > 0) {
          if ($x == $date['mday']) {
            echo '<div class="currentday"><h3>'.$x.'</h3></div>';
          } else {
            echo '<div class="day"><h3>'.$x.'</h3></div>';
          }  
        } else {
          echo '<div class="empty"></div>';
        }
        $x++;
      }
    ?>
    <footer>
      <p>Footer goes here</p>
    </footer>
  </body>

</html>