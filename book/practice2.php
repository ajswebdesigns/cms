<?php

$hours = [
  'Monday' => 'Monday Hours Are 8am-8pm',
  'Tuesday' => 'Tuesday Hours Are 8am-8pm',
  'Wednesday' => 'Wednesday Hours Are 8am-8pm',
  'Thursday' => 'Thursday Hours Are 8am-8pm',
  'Friday' => 'Friday Hours Are 8am-8pm',
  'Saturday' => 'Saturday Hours Are 8am-8pm',
  'Sunday' => '<h1>Sorry We Are Closed</h1>',
];


$day = $_GET['hours'];
$display_hours = $hours[$day];
echo $display_hours;







?>
<?php
if(isset($_POST['submit'])){
  $first_name = $_POST['fName'];
  
}


?>

<form action="" method="post">
  <input type="text" name="fName">
  <!-- <input type="text" name="lName"> -->
  <input type="submit" name="submit">
</form>