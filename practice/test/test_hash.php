<?php
echo $password = 12345;
echo '<br>';
$hasehdPW =  password_hash($password, PASSWORD_BCRYPT);
echo password_verify($password, $hasehdPW);



$friends = array("Caleb", "Dan", "Greg");
foreach($friends as $friend): ?>
<p><?= $friend; ?></p>
<?php endforeach; ?>
<?php

$number = 5;

$str = 'Beining';

printf("there are %u millon bicycles in %s", $number, $str); ?>
<br><?php
function print_name($first, $last){
  $full_name = $first . ' ' .$last;
  echo $full_name;
}
print_name('Kristyn', 'Nichols');

?>
<br>

<?php


$friends = array("James", "Dan", "Craig");
// echo count($friends);


$new_friends = ["Caleb", "greg", "holly"];

// echo $new_friends[0];


$more_friends = [
  "first_name"   => "Andrew",
  "last_name"    => "Nichols"
];

echo $more_friends['last_name'];


