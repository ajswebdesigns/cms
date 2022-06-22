<?php
echo $password = 12345;
echo '<br>';
$hasehdPW =  password_hash($password, PASSWORD_BCRYPT);
echo password_verify($password, $hasehdPW);


?>