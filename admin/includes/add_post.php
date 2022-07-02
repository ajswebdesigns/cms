<?php



if(isset($_POST['create_post'])){



  $post_title = escape($_POST['title']);
  $post_user = escape($_POST['post_user']);

  $post_author = escape($_POST['author']);

  $post_category_id = escape($_POST['post_category']);

  $post_status = escape($_POST['post_status']);



  $post_image = $_FILES['image']['name'];

  $post_image_temp = $_FILES['image']['tmp_name'];



  $post_tags = escape($_POST['post_tags']);

  $post_content = escape($_POST['post_content']);

  $post_date = escape(date('Y-m-d'));

  // $post_comment_count = 4;



    move_uploaded_file($post_image_temp, "../images/$post_image" );



    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";

    $query .= "VALUES ({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";



    $create_post_query = mysqli_query($connection, $query);?>
    $the_post_id = mysqli_insert_id($connection);
      <div class="alert alert-success" role="alert">
    Post Sucessfully Added! 
    </div>
    <?php 



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
    <select name="post_category" id="post_category">
        
        <?php
            $query = "SELECT * FROM categories";
            $select_categories = mysqli_query($connection,$query); 
//            confirmQuery($select_categories);
                while($row = mysqli_fetch_assoc($select_categories)){
                    $cat_id = escape($row['cat_id']);
                    $cat_title = escape($row['cat_title']);
                    
                    echo "<option value='{$cat_id}'>$cat_title</option>";
                
                }
        ?>
        
        
        
    </select>
   </div>
   




<div class="form-group">
  <label for="">Users</label>
    <select name="post_category" id="post_category">
        
        <?php
            $users_query = "SELECT * FROM  users";
            $select_users = mysqli_query($connection,$users_query); 
//            confirmQuery($select_categories);
                while($row = mysqli_fetch_assoc($select_users)){
                    $user_id = $row['user_id'];
                    $username= $row['username'];
                    
                    echo "<option value='{$user_id}'>$username</option>";
                   
                
                }
        ?>
        
        
        
    </select>
   </div>


<!-- Post Author -->
<!-- <div class="form-group">
  <label for="title">Post Author</label>
  <input id="title" type="text" class="form-control" name="author">
</div> -->

<!-- Post Status -->
<div class="form-group">
  <!-- <label for="post_status">Post Status</label> -->

  <select name="post_status" id="">
    <option value="draft">Post Status</option>
    <option value="published">Published</option>
    <option value="draft">Draft</option>
  </select>
  <!-- <input id="post_status" type="text" class="form-control" name="post_status"> -->
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
  <label for="summernote">Post Content</label>
  <textarea id="summernote" class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
</div>

<!-- Submit Form -->
<div class="form-group">
<input class="btn btn-primary" type="submit" name="create_post" value="Publish">
</div>

</form>



