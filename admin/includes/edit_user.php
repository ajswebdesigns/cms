<?php

if (isset($_GET['edit_user'])) {

  $the_edit_user = $_GET['edit_user']; // You need to fetch edit_user not edit_users

  $query = "SELECT * FROM users WHERE user_id = $the_edit_user ";

  $select_users_query = mysqli_query($connection, $query);

  while ($row = mysqli_fetch_assoc($select_users_query)) {

    $user_id = $row['user_id'];

    $username = $row['username']; // It should be lowercase $username

    $user_password = $row['user_password'];

    $user_firstname = $row['user_firstname'];

    $user_lastname = $row['user_lastname'];

    $user_email = $row['user_email'];

    $user_image = $row['user_image'];

    $user_role = $row['user_role'];
  }
}

if (isset($_POST['edit_user'])) {

  $user_firstname = $_POST['user_firstname'];

  $user_lastname = $_POST['user_lastname'];

  $user_role = $_POST['user_role'];

  // $post_image =$_FILES['image']['name'];

  // $post_image_tmp=$_FILES['image']['tmp_name'];

  $username = $_POST['username'];

  $user_email = $_POST['user_email'];

  $user_password = $_POST['user_password'];

  //  $post_date = date('d-m-y');

  // move_uploaded_file($post_image_tmp, "../images/$post_image");

$query = "SELECT randSalt FROM users";
$select_randsalt_query = mysqli_query($connection,$query);
if(!$select_randsalt_query){
  die("Query Failed" . mysqli_error($connection));
}

$row = mysqli_fetch_array($select_randsalt_query);
$salt = $row['randSalt'];
$hashed_password = crypt($user_password, $salt);

  $query = "UPDATE users set ";



  $query .= "user_firstname = '{$user_firstname}', ";



  $query .= "user_lastname = '{$user_lastname}', ";



  $query .= "user_role = '{$user_role}', ";

  $query .= "username = '{$username}', ";



  $query .= "user_email = '{$user_email}', ";



  $query .= "user_password = '{$hashed_password}' ";



  $query .= "WHERE user_id = {$the_edit_user} ";



  $edit_user_query = mysqli_query($connection, $query);



  if (!$edit_user_query) {

    die('Query Failed!!' . mysqli_error($connection));
  }
}

?>

<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">

    <label for="title">Firstname</label>

    <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">

  </div>

  <div class="form-group">

    <label for="post_status">Lastname</label>

    <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">

  </div>

  <div class="form-group">

    <select name="user_role" id="">



      <option value="<?php echo $user_role; ?> "><?php echo $user_role;  ?></option>

      <?php



      if ($user_role == 'admin') {

        echo "<option value='subscriber'>User</option>";
      } else {

        echo  "<option value='admin'>Admin</option>";
      }

      ?>
    </select>

  </div>

  <!--

          <div class="form-group">

            <label for="post_image">Post Image</label>

            <input type="file" name="image">

          </div>

        -->

  <div class="form-group">

    <label for="post_tags">Username</label>

    <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">

  </div>

  <div class="form-group">

    <label for="post_contents">Email</label>

    <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">

  </div>
  <div class="form-group">
    <label for="post_contents">Password</label>
    <input type="password" class="form-control" name="user_password" value="<?= $user_password; ?>">
  </div>
  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="edit_user" value="Update User">

  </div>
</form>
<?php
//very important piece of code to understand..

?>