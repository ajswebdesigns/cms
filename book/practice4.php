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


if (isset($_GET['day'])){
  $get_day = $_GET['day'];
  $display_day = $days[$get_day];
echo $display_day;
} else {
  echo 'Nothing hhas been set you fool';
}

$valid = array_key_exists($get_day, $days);
if($valid){
  echo 'perfect';
}

?>
<script>
let friend = {
  firstName: 'Andrew',
};
// spread
let friend2 = {
  ...friend,
  lastName: 'Nichols',
};
// destructure an array
const {firstName} = friend;
console.log(firstName);

// call back

function greetUser(callBack){
  console.log('hi');
  callBack();
}

function printAfter(){
console.log(' Im being called form another function');
}

greetUser(printAfter);
// Arrow Functon
hello = ()=>{
  console.log('hi')
}
// function decleatariton
function helloTwo(){

}
// function dexpression
let myName = function(){

}

</script>