<?php
  // set default timezone to Sydney, Australia
  date_default_timezone_set('Australia/Sydney');

  if (isset($_GET['m'])) {
    $month = $_GET['m'];
  } else {
    $month = date('n');
  }

  if (isset($_GET['y'])) {
    $year = $_GET['y'];
  } else {
    $year = date('Y');
  }

  // Set previous and next month values
  $prevmonth = date('n', mktime(0,0,0,$month - 1));
  $nextmonth = date('n', mktime(0,0,0,$month + 1));
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
    <div class="month-nav">
      <a href="?m=<?php echo $prevmonth; ?>&y=<?php if ($prevmonth == 12) { echo $year - 1; } else { echo $year; } ?>"><h3>Prev</h3></a>
    </div>
    <div class="month">
      <h2><?php echo date('F').' '.date('Y'); ?><h2>
    </div>
    <div class="month-nav">
      <a href="?m=<?php echo $nextmonth; ?>&y=<?php if ($nextmonth == 1) { echo $year + 1; } else { echo $year; } ?>"><h3>Next</h3></a>
    </div>
    <div class="month-spacer"></div>
    <?php
      // display day labels
      $daynames = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
      foreach ($daynames as $item) {
        echo '<div class="dayname"><h3>'.$item.'</h3></div>';
      }

      // get number of days for current month
      $days = date('t', mktime(0,0,0,$month));

      // get name of first day of month
      $firstday = date('l', mktime(0,0,0,$month,1,$year));

      // lookup key for corresponding day name
      $key = array_keys($daynames, $firstday);

      // initiliase counter to offset grid start day
      $x = 1 - $key['0'];
      $y = date('t', mktime(0,0,0, date('n') - 1)) - $key['0'];

      // display days of month as grid items
      while ($x <= $days) {
        if ($x > 0) {
          if ($x == date('j') && $month == date('n') && $year == date('Y')) {
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

      while ($x <= (42-$key['0'])) {
        echo '<div class="empty"><h4>'.$y.'</h4></div>';
        $x++;
        $y++;
      }
    ?>
    <footer>
      <p><a href="?m=<?php echo date('n'); ?>&y=<?php echo date('Y'); ?>">Go to today</a><p>
    </footer>
  </body>

</html>