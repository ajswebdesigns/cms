 <table class="table table-bordered table-hover">
   <thead>
     <tr>
       <th>ID</th>
       <th>Username</th>
       <th>Firstname</th>
       <th>Lastname</th>
       <th>Email</th>
       <th>Role</th>
       <th>Approve</th>
       <th>Unapprove</th>
       <th>Delete</th>
     </tr>
   </thead>
   <tbody>
     <?php
      $query = "SELECT * FROM users";
      $select_users = mysqli_query($connection, $query);
      while ($row = mysqli_fetch_assoc($select_users)) {
        $user_id = escape($row['user_id']);
        $username = escape($row['username']);
        $user_password = escape($row['user_password']);
        $user_firstname = escape($row['user_firstname']);
        $user_lastname = escape($row['user_lastname']);
        $user_email = escape($row['user_email']);
        $user_image = escape($row['user_image']);
        $user_role = escape($row['user_role']);
        echo "<tr>";
        echo "<td>$user_id</td>";
        echo "<td> $username</td>";
        echo "<td> $user_firstname</td>";
        echo "<td> $user_lastname</td>";
        echo "<td> $user_email</td>";
        echo "<td> $user_role</td>";
        echo "<td><a href='users.php?change_to_admin=$user_id'>Change To Admin</a></td>";
        echo "<td><a href='users.php?change_to_sub=$user_id'>Change To Sub</a></td>";
        echo "<td><a href='users.php?source=edit_user&edit_user=$user_id'>Edit</a></td>";
        echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>";
        echo "</tr>";
      }
      ?>

   </tbody>
 </table>

 <?php

  // // unapprove query
  // if (isset($_GET['unapprove'])) {
  //   $the_comment_id = $_GET['unapprove'];
  //   $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id ";
  //   $unapprove_comment_query = mysqli_query($connection, $query);
  //   header('Location: comments.php');
  // }

// Change To Admin
            if(isset($_GET['change_to_admin'])){
          $the_user_id = $_GET['change_to_admin'];
          $query = "UPDATE users SET  user_role = 'admin' WHERE user_id = $the_user_id ";
          $change_to_admin_query = mysqli_query($connection, $query);
          header('Location: users.php');
        }

// Change To Sub
            if(isset($_GET['change_to_sub'])){
          $the_user_id = $_GET['change_to_sub'];
          $query = "UPDATE users SET  user_role = 'subscriber' WHERE user_id = $the_user_id ";
          $change_to_subscriber_query = mysqli_query($connection, $query);
          header('Location: users.php');
        }


    

  // Delete Query
  if (isset($_GET['delete'])) {
    $the_user_id = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id = $the_user_id";
    $delete_user_query = mysqli_query($connection, $query);
    header('Location: users.php');
  }
  ?>


