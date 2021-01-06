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
      <h1 class="title"><a href="http://calendar.localhost">Calendar</a></h1>
      <form class="dateform" method="get">
        <fieldset>
          <label for="monthlist">Month:</label>
          <select id="monthlist" name="m">
            <?php
              // create loop counter
              $i = 1;

              // loop through output options
              while ($i <= 12) {
                // get month name
                $m = date('F', mktime(0,0,0,$i));

                // if current month, set as selected option
                if ($i == $month) {
                  echo '<option selected="selected" value="'.$i.'">'.$m.'</option>';
                } else {
                  echo '<option value="'.$i.'">'.$m.'</option>';
                }

                $i++;
              }
            ?>
          </select>
          <label for="year">Year:</label>
          <input id="year" name="y" type="text" pattern="[0-9]{4}" value="<?php echo $year; ?>" placeholder="<?php echo $year; ?>" size="10">
          <input type="submit" value="Go to Date">
        </fieldset>
      </form>
    </header>
    <div class="month-spacer"></div>
    <div class="month-nav">
      <a href="?m=<?php echo $prevmonth; ?>&y=<?php if ($prevmonth == 12) { echo $year - 1; } else { echo $year; } ?>"><h3><?php echo date('F', mktime(0,0,0,$prevmonth)); ?></h3></a>
    </div>
    <div class="month">
      <h2><?php echo date('F', mktime(0,0,0,$month)).' '.$year; ?><h2>
    </div>
    <div class="month-nav">
      <a href="?m=<?php echo $nextmonth; ?>&y=<?php if ($nextmonth == 1) { echo $year + 1; } else { echo $year; } ?>"><h3><?php echo date('F', mktime(0,0,0,$nextmonth)); ?></h3></a>
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
      $i = 1 - $key['0'];
      $n = date('t', mktime(0,0,0, date('n') - 1)) - $key['0'];

      // display days of month as grid items
      while ($i <= $days) {
        if ($i > 0) {
          if ($i == date('j') && $month == date('n') && $year == date('Y')) {
            echo '<div id='.$i.' class="day currentday" onclick="selectday('.$i.')"><h4>'.$i.'</h4></div>';
          } else {
            echo '<div id='.$i.' class="day" onclick="selectday('.$i.')"><h4>'.$i.'</h4></div>';
          }  
        } else {
          $n++;
          echo '<div class="day othermonth"><h4>'.$n.'</h4></div>';
        }
        $i++;
      }

      // Add empty spaces to end of calendar grid section
      // initialise counter
      $n = 1;

      // loop until 42 grid items
      while ($i <= (42-$key['0'])) {
        echo '<div class="day othermonth"><h4>'.$n.'</h4></div>';
        $i++;
        $n++;
      }
    ?>
    <footer>
      <p><a href="?m=<?php echo date('n'); ?>&y=<?php echo date('Y'); ?>">Go to today</a><p>
      <script src="js/selectday.js"></script>
    </footer>
  </body>
</html>