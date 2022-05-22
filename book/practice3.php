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

// foreach($days as $key => $day){
//   echo $key. ' - ' . $day. '<br>';
// }
if(isset($_POST['submit'])){
  $first_name = $_POST['fName'];
  $last_name = $_POST['lName'];
}

$get_day = $_GET['days'];
$display_day = $days[$get_day];
echo $display_day;





?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    label {
      display:block;
      font-weight:bold;

    }
    input {
      display:block;
      
    }
    input:last-child{
      margin-top:10px;
      padding:3px;
      font-weight:bold;
    }
  </style>
</head>
<body>
  <section>
    <h1>Get in touch with us today</h1>
    <form action="" method="post">
      <label for="fName">First Name</label>
      <input id="fName" type="text" name="fName" placeholder="First Name..." required>

      <label for="lName">Last Name</label>
      <input id="lName" type="text" name="lName" placeholder="Last Name..." required>

      <input type="submit" name="submit">

      <?= 'Hello'. ' ' .$first_name; ?>
       

    </form>
  </section>
  <script>
 class Person {
   constructor(firstName, lastName, age){
     this.firstName = firstName;
     this.lastName = lastName;
     this.age = age;
   }
   printName(){
     alert(this.firstName);
   }
 }


 let friends = {
   firstName: 'Andrew',
   lastName: 'Harper',
 }
 let friendsNew = {
   ...friends,
 }
 const {firstName} = friends;
 console.log(firstName);

friend.forEach((x)=>{
  console.log(x);
})


  </script>



</body>
</html>




