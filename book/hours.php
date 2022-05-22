<?php
$days = [
  'Monday'      => 'Today is Monday',
  'Tuesday'     => 'Today is Tuesday',
  'Wednesday'   => 'Today is Wednesday',
  'Thursday'    => 'Today is Thursday',
  'Friday'      => 'Today is Friday!',
  'Saturday'    => 'Today is saturday',
  'Sunday'      => 'Today is Sunday',
];


$day = $_GET['day'];
$display_day = $days[$day];




$day = $_GET['day'] ?? '';
if($day) {
 $display_day = $days[$day];
} else {
  echo 'idk';
}


// foreach($days as $key=> $day){
//   echo $key. ' ' .$day. '<br>';
// }

