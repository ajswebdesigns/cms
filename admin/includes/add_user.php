<?php

// require "../includes/db.php";

if (isset($_POST['create_user'])) {

  $user_firstname = escape($_POST['user_firstname']);
  //här ändra post_category_id till post_category
  $user_lastname = escape($_POST['user_lastname']);
  $user_role = escape($_POST['user_role']);

  //$post_image = $_FILES['post_image']['name'];
  //$post_image_temp = $_FILES['post_image']['tmp_name'];

  $username = escape($_POST['username']);
  $user_email = escape($_POST['user_email']);
  $user_password = escape($_POST['user_password']);
   $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

  $query = "INSERT INTO users(user_firstname,user_lastname,user_role,username,user_email,user_password) ";

  $query .= "VALUES ('{$user_firstname}', '{$user_lastname}', '{$user_role}', '{$username}','{$user_email}', '{$user_password}') ";

  $create_user_query = mysqli_query($connection, $query);

  //confirm($create_user_query);
  echo "User Created: " . " " . "<a href='users.php'>View Users</a> ";

}
?>

<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="firstname"> Firstname </label>
    <input type="text" class="form-control" name="user_firstname">
  </div>

  <div class="form-group">
    <label for="author"> Lastname</label>
    <input type="text" class="form-control" name="user_lastname">
  </div>

  <div class="form-group">
    <select name="user_role" id="">
      <option value="Subscriber">Select options</option>
      <option value="Admin">Admin</option>
      <option value="subscriber">Subscriber</option>
    </select>
  </div>

  <!-- <div class="form-group">
        <label for="title"> Post Image </label>
        <input type="file" class="form-control" name="post_image">
    </div> -->


  <div class="form-group">
    <label for="user"> Username </label>
    <input type="text" class="form-control" name="username">
  </div>

  <div class="form-group">
    <label for="email"> e-mail </label>
    <input type="email" class="form-control" name="user_email">
  </div>

  <div class="form-group">
    <label for="user_password"> Password </label>
    <input type="password" class="form-control" name="user_password">
  </div>


  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_user" value="Add user">
  </div>
</form>