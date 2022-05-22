<?php
// Current Year
$copyright_date = date('Y');

// Users Name
$current_user = 'Andrew';

// friends Array
$friends = ['Caleb', 'Dan', 'Greg', 'Matt', 'James'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>
  <h1>Hello <?= $current_user ?></h1>
  <ul>
     <?php foreach($friends as $friend){ ?>
        <li><?= $friend ?></li>
    <?php }  ?>


  
  </ul>

<script>
let myFriends = ['Caleb', 'Dan', 'Greg', 'matt', 'James', 'Aspen'];
for(let i = 0; i < myFriends.length; i++){
  let friendList = document.createElement('li');
  friendList.innerText = myFriends[i];
  document.body.appendChild(friendList);
}

</script>




  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></scrip>
</body>
</html>