<?php



if(isset($_POST['create_post'])){



  $post_title = $_POST['title'];

  $post_author = $_POST['author'];

  $post_category_id = $_POST['post_category_id'];

  $post_status = $_POST['post_status'];



  $post_image = $_FILES['image']['name'];

  $post_image_temp = $_FILES['image']['tmp_name'];



  $post_tags = $_POST['post_tags'];

  $post_content = $_POST['post_content'];

  $post_date = date('Y-m-d');

  $post_comment_count = 4;



    move_uploaded_file($post_image_temp, "../images/$post_image" );



    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";

    $query .= "VALUES ({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_comment_count}','{$post_status}')";



    $create_post_query = mysqli_query($connection, $query);



    // if (!$create_post_query) {

    //   die ("Query Failed" . mysqli_error($connection));

    // }
    // confirmQuery($create_post_query);
    // header("Location: http://localhost:8888/admin/posts.php");

}

?>


<form action="" method="post" enctype="multipart/form-data">
  <!-- Post Title -->
<div class="form-group">
  <label for="title">Post Title</label>
  <input id="title" type="text" class="form-control" name="title">
</div>

<!-- Post Category Id -->
<div class="form-group">
  <label for="post_category">Post Category ID</label>
  <input id="post_category" type="text" class="form-control" name="post_category_id">
</div>

<!-- Post Author -->
<div class="form-group">
  <label for="title">Post Author</label>
  <input id="title" type="text" class="form-control" name="author">
</div>

<!-- Post Status -->
<div class="form-group">
  <label for="post_status">Post Status</label>
  <input id="post_status" type="text" class="form-control" name="post_status">
</div>

<!-- Post Image -->
<div class="form-group">
  <label for="post_image">Post Image</label>
  <input id="post_image" type="file"  name="image">
</div>

<!-- Post Tags -->
<div class="form-group">
  <label for="post_tags">Post Tags</label>
  <input id="post_tags" type="text" class="form-control" name="post_tags">
</div>

<!-- Post Content -->
<div class="form-group">
  <label for="post_content">Post Content</label>
  <textarea id="post_content" class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
</div>

<!-- Submit Form -->
<div class="form-group">
<input class="btn btn-primary" type="submit" name="create_post" value="Publish">
</div>

</form>