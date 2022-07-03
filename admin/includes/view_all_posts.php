 <?php
  include('delete_modal.php');
  if (isset($_POST['checkBoxArray'])) {
    foreach ($_POST['checkBoxArray'] as $postValueId) {
      echo $bulk_options =  $_POST['bulk_options'];

      switch ($bulk_options) {
        case 'published':
          $query = "UPDATE posts SET post_status = '$bulk_options' WHERE post_id = '$postValueId' ";
          $update_to_publish = mysqli_query($connection, $query);
          break;
        case 'draft':
          $query = "UPDATE posts SET post_status = '$bulk_options' WHERE post_id = '$postValueId' ";
          $update_to_draft = mysqli_query($connection, $query);
          break;
        case 'delete':
          $query = "DELETE  FROM posts WHERE post_id = '$postValueId' ";
          $update_to_delete_status = mysqli_query($connection, $query);
          break;

        case 'clone':
          $query = "SELECT * FROM posts WHERE post_id = '$postValueId' ";
          $select_post_query = mysqli_query($connection, $query);

          while ($row = mysqli_fetch_array($select_post_query)) {
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_date = $row['post_date'];
            $post_author = $row['post_author'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_tags = $row['post_tags'];
            $post_content = $row['post_content'];
          }
          $query = "INSERT INTO posts(post_title,post_category_id,post_date,post_author,post_status,post_image,post_tags,post_content) ";
          $query .= "VALUES('$post_title', $post_category_id, '$post_date', '$post_author', '$post_status', '$post_image', '$post_tags', '$post_content')";
          $copy_query = mysqli_query($connection, $query);
          if (!$copy_query) {
            echo 'Failed' . mysqli_error($connection);
          }
          break;
      }
    }
  }

  ?>

 <form action="" method="post">
   <table class="table table-bordered table-hover">
     <div id="bulkOptionsContainer" class="col-xs-4">
       <select class="form-control" name="bulk_options" id="">
         <option value="">Select Options</option>
         <option value="published">Publish</option>
         <option value="draft">Draft</option>
         <option value="delete">Delete</option>
         <option value="clone">Clone</option>
       </select>
     </div>
     <div class="col-xs-4">
       <input type="submit" name="submit" class="btn btn-sucess" value="Apply">
       <a class="btn btn-primary" href="posts.php?source=add_post">Add new</a>
     </div>
     <thead>
       <tr>
         <th><input style="padding:0;" id="selectAllBoxes" type="checkbox"></th>
         <th>ID</th>
         <th>Author</th>
         <th>Title</th>
         <th>Category</th>
         <th>Status</th>
         <th>Image</th>
         <th>Tags</th>
         <th>Comments</th>
         <th>Date</th>
         <th>View</th>
         <th>Edit</th>
         <th>Delete</th>
         <th>Views</th>

       </tr>
     </thead>
     <tbody>
       <?php
        // $query = "SELECT * FROM posts ORDER BY post_id DESC ";
        $query = "SELECT posts.post_id, posts.post_author, posts.post_user, posts.post_title, posts.post_category_id, posts.post_status, posts.post_image,posts.post_tags, posts.post_comment_count, posts.post_date, posts.post_views_count, categories.cat_id, categories.cat_title FROM posts LEFT JOIN categories ON posts.post_category_id = categories.cat_id ORDER BY posts.post_id DESC ";

        $select_posts = mysqli_query($connection, $query);

        if (!$select_posts) {
          die('error' . mysqli_error($connection));
        }
        while ($row = mysqli_fetch_assoc($select_posts)) {
          $post_id = escape($row['post_id']);
          $post_author = escape($row['post_author']);
          $post_user = escape($row['post_user']);
          $post_title = escape($row['post_title']);
          $post_category_id = escape($row['post_category_id']);
          $post_status = escape($row['post_status']);
          $post_image = escape($row['post_image']);
          $post_tags = escape($row['post_tags']);
          $post_comment_count = escape($row['post_comment_count']);
          $post_date = escape($row['post_date']);
          $category_title = escape($row['cat_title']);
          $category_id = escape($row['cat_id']);

          $post_views_count = escape($row['post_views_count']);

          echo "<tr>"; ?>
         <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="<?= $post_id ?>"></td>
       <?php

          echo "<td>$post_id</td>";
          if (isset($post_author)  || !empty($post_author)) {
            echo "<td> $post_author</td>";
          } elseif (isset($post_user)  || !empty($post_user)) {
            echo "<td> $post_user</td>";
          }

          echo "<td>$post_title</td>";
          echo "<td>$category_title</td>";
          echo "<td>$post_status </td>";
          echo "<td><img width='100' src='../images/$post_image'></td>";
          echo "<td>$post_tags </td>";

          $comment_query = "SELECT * FROM comments WHERE comment_post_id = {$post_id}";
          $fetch_comment = mysqli_query($connection, $comment_query);
          $row = mysqli_fetch_array($fetch_comment);
          $post_comments = mysqli_num_rows($fetch_comment);
          if ($post_comments > 0) {
            $comment_post_id = $row['comment_post_id'];
            echo "<td><a href='post_comments.php?id={$comment_post_id}'>$post_comments</a></td>";
          } else {
            echo "<td>$post_comments</td>";
          }
          echo "<td>$post_date</td>";
          echo "<td><a href='../post.php?p_id=$post_id'>View Post</a></td>";
          echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
          // echo "<td><a onClick=\"javascript:return confirm('Are you sure you want to delete'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";
          echo "<td><a rel='{$post_id}' href='#' class='delete_link';>Delete</a></td>";

          echo "<td><a href='posts.php?reset=$post_id'>$post_views_count</a></td>";
          echo "</tr>";
        }
        ?>

     </tbody>
   </table>
 </form>

 <?php
  if (isset($_GET['delete'])) {
    $the_post_id = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id = $the_post_id";
    $delete_query = mysqli_query($connection, $query);
    header('Location: posts.php');
  }
  ?>

 <?php
  // Reset View Query
  if (isset($_GET['reset'])) {
    $post_id = $_GET['reset'];
    $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = $post_id ";
    $reset_view_count = mysqli_query($connection, $query);
    header('Location: posts.php');
  }

  ?>

 <?php include('admin_footer.php'); ?>
 
 <script>
   $("document").ready(function() {
     $(".delete_link").on('click', function() {
       let id = $(this).attr('rel');
       let delete_url = `posts.php?delete=${id}`;
       $(".modal_delete_link").attr("href", delete_url);
       $("#myModal").modal('show');
     })

   })
 </script>