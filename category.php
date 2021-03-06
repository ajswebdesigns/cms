    <!-- Header -->
    <?php include './includes/db.php' ?>
    <?php include './includes/header.php' ?>
    <!-- Navigation -->
    <?php include './includes/navigation.php' ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php
                if (isset($_GET['category'])) {
                    $post_category_id = $_GET['category'];
                
                $query = "SELECT * FROM posts WHERE post_category_id = {$post_category_id} AND post_status = 'publish' ";
                if(mysqli_num_rows($select_all_posts_query) < 1 ){
echo 'there are no posts';
                } else {
                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    // var_dump($row);
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'], 0, 350);
                ?>


                    <h1 class="page-header">
                        Page Heading
                        <small>Secondary Text</small>
                    </h1>

                    <!-- First Blog Post -->
                    <h2>
                        <a href="post.php?p_id=<?= $post_id ?>"><?= $post_title ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?= $post_author ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span><?= $post_date ?></p>
                    <hr>

                    <a href="post.php?p_id=<?= $post_id ?>"><img class="img-responsive" src="/images/<?php echo $post_image ?>" alt=""></a>

                    <hr>
                    <p><?= $post_content ?></p>
                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>
                <?php }}}

                ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include './includes/sidebar.php'  ?>

        </div>
        <!-- /.row -->

        <hr>




        <?php include './includes/footer.php'  ?>