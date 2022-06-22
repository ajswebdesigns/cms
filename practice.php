<?php 

// $name = 'Andrew';
// printf('Hello %s', $name);
// $num = 5;

// printf('you have selected %o', $num);
$input = 'Maddogs';
$hashed_pw = password_hash($input, PASSWORD_BCRYPT);
// echo $hashed_pw;
echo password_verify($input, $hashed_pw);