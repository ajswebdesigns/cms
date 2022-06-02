<?php
// Make an array normal way

$friends = array("Caleb", "dan");
//array shorthand

$newFriends = ['Greg', 'Matt'];
// echo $newFriends[1];
// associate arrays

$location = array('First_person' => 'texaz', 'second_person' => 'California');
// echo $location['second_person'];
// below example with a key
foreach($location as $key => $x) {
  echo $key . ' ' .$x. '<br>';
}


?>