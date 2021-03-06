    <!-- Header -->
    <?php include './includes/db.php'?>
    <?php include './includes/header.php'?>
    <!-- Navigation -->
    <?php include './includes/navigation.php'?>
<?php
// Liking the post
if (isset($_POST['liked'])) {

    $post_id = $_POST['post_id'];

    $user_id = $_POST['user_id'];

    //1 = FECTCHING THE RIGHT POST

    $query = "SELECT * FROM posts WHERE post_id=$post_id";

    $postResult = mysqli_query($connection, $query);

    $postRequest = mysqli_fetch_array($postResult);

    $likes = $postRequest['likes'];

    //2 = UPDATE- INCREMENTING WITH LIKES

    mysqli_query($connection, "UPDATE posts SET likes=$likes +1 WHERE post_id=$post_id");

    //3 = CREATE LIKES FOR POST

    mysqli_query($connection, "INSERT INTO likes(user_id,post_id) VALUES($user_id,$post_id)");

    exit();

}

// Unliking the post

if (isset($_POST['unliked'])) {

    $post_id = $_POST['post_id'];

    $user_id = $_POST['user_id'];

    //1 = FECTCHING THE RIGHT POST

    $query = "SELECT * FROM posts WHERE post_id=$post_id";

    $postResult = mysqli_query($connection, $query);

    $postRequest = mysqli_fetch_array($postResult);

    $likes = $postRequest['likes'];

    //2 = UPDATE- INCREMENTING WITH LIKES

    mysqli_query($connection, "UPDATE posts SET likes=$likes -1 WHERE post_id=$post_id");

    //3 = CREATE LIKES FOR POST

    mysqli_query($connection, "INSERT INTO likes(user_id,post_id) VALUES($user_id,$post_id)");

    exit();

}

?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php

if (isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];

    $view_query = "UPDATE posts SET post_views_count = post_views_count +1 WHERE post_id =$the_post_id ";
    $send_query = mysqli_query($connection, $view_query);

    if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
        $query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
    } else {
        $query = "SELECT * FROM posts WHERE post_id = {$the_post_id} AND post_status = 'published'";
    }

    $select_all_posts_query = mysqli_query($connection, $query);
    if (mysqli_num_rows($select_all_posts_query) < 1) {
        echo 'No Posts Available';
    } else {

        while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
            // var_dump($row);
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            ?>

                    <h1 class="page-header">
                        Page Heading
                        <small>Secondary Text</small>
                    </h1>

                    <!-- First Blog Post -->
                    <h2>
                        <a href="#"><?=$post_title?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?=$post_author?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span><?=$post_date?></p>
                    <hr>
                    <img class="img-responsive" src="/images/<?php echo $post_image ?>" alt="">
                    <hr>
                    <p><?=$post_content?></p>
                    <!-- <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->

                    <hr>

                        <div class="row">
                            <p class="pull-right"><a class="like-btn" href="#"><span class="glyphicon glyphicon-thumbs-up"></span> Like</a></p>
                        </div>
                        <div class="row">
                            <p class="pull-right"><a class="unlike" href="#"><span class="glyphicon glyphicon-thumbs-down"></span> Unlike</a></p>
                        </div>
                          <div class="row">
                            <p class="pull-right">Like: 10</p>
                        </div>
                        <div class="clearfix">

                        </div>
                <?php }}} else {
    header('Location: index.php');
}

?>

                <!-- Blog Comments -->

                <?php
if (isset($_POST['create_comment'])) {
    $the_post_id = $_GET['p_id'];
    $comment_author = $_POST['comment_author'];
    $comment_email = $_POST['comment_email'];
    $comment_content = $_POST['comment_content'];
    if (!empty($comment_author && $comment_email && $comment_content)) {
        $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
        $query .= "VALUES($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now())";
        $create_comment_query = mysqli_query($connection, $query);
        if (!$create_comment_query) {
            die('Query Failed' . mysqli_error($connection));
        }

        // $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
        // $query .= "WHERE post_id = $the_post_id ";
        // $update_comment_count = mysqli_query($connection, $query);

    } else {
        echo "<script>alert('Fields Cannot Be Empty')</script>";
    }
    header("Location: post.php?p_id=$the_post_id");
}

?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="POST">
                        <!-- Comment Author -->
                        <div class="form-group">
                            <label for="author">Author:</label>
                            <input id="author" class="form-control" type="text" name="comment_author">
                        </div>
                        <!-- Comment Email -->
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input id="email" class="form-control" type="email" name="comment_email">
                        </div>

                        <div class="form-group">
                            <label for="comment">Your Comment:</label>
                            <textarea name="comment_content" id="comment" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <hr>

                <!-- Posted Comments -->
                <?php

$query = "SELECT * FROM comments WHERE comment_post_id = $the_post_id ";
$query .= "AND comment_status = 'approved' ";
$query .= "ORDER BY comment_id DESC ";
$select_comment_query = mysqli_query($connection, $query);
if (!$select_comment_query) {
    die('Query has failed' . mysqli_error($connection));
}
while ($row = mysqli_fetch_array($select_comment_query)) {
    $comment_date = $row['comment_date'];
    $comment_content = $row['comment_content'];
    $comment_author = $row['comment_author'];?>

                    <!-- Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="https://via.placeholder.com/64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?=$comment_author;?>
                                <small><?=$comment_date;?></small>
                            </h4>
                            <p><?=$comment_content;?></p>
                        </div>
                    </div>

                <?php }?>
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <?php include './includes/sidebar.php'?>
        </div>
        <!-- /.row -->
        <hr>
        <?php include './includes/footer.php'?>
<script>
    var post_id = <?php echo $the_post_id; ?>;
    var user_id = 3;

    $(document).ready(function(){
        // Like Post
        $('.like-btn').click(function(){
            $.ajax({

                url: "post.php?p_id=<?php echo $the_post_id; ?>",
                method: "POST",
                data: {
                    'liked': 1,
                    'post_id': post_id,
                    'user_id': user_id

                }
            });
        });


        // Unliking Post
            $('.unlike').click(function(){
            $.ajax({

                url: "post.php?p_id=<?php echo $the_post_id; ?>",
                method: "POST",
                data: {
                    'unliked': 1,
                    'post_id': post_id,
                    'user_id': user_id

                }
            });
        });


    });


</script>

