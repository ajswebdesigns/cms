    <!-- Header -->
    <?php include './includes/db.php' ?>
    <?php include './includes/header.php' ?>
    <!-- Navigation -->
    <?php include './includes/navigation.php' ?>
    <?php  $per_page = 5; ?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php
   
                if (isset($_GET['page'])) {
                    $per_page = 10;
                    $page = $_GET['page'];

                    // $per_page = 2;


                } else {
                    $page = '';
                }
                if ($page == "" || $page == 1) {
                    $page_1 = 0;
                } else {
                    $page_1 = ($page * $per_page) - $per_page;
                }
                // Need to find out how many posts that we have currently on the website
                $post_query_count = "SELECT * FROM posts WHERE post_status = 'published'";
                $find_count = mysqli_query($connection, $post_query_count);
                $count = mysqli_num_rows($find_count);
                if($count < 1){
                    echo 'no posts';
                } else {



                

                $count =  ceil($count / $per_page);
                // echo $count;
                $query = "SELECT * FROM posts ORDER BY post_id DESC  LIMIT $page_1, $per_page";
                $select_all_posts_query = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    // var_dump($row);
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'], 0, 350);
                    $post_status = $row['post_status'];
                    if ($post_status !== 'published') {
                    } else {

                ?>

                        <h1 class="page-header">
                            Page Heading
                            <small>Secondary Text</small>
                        </h1>

                        <!-- First Blog Post -->

                        <h2>
                            <a href="post/<?= $post_id ?>"><?= $post_title ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="author_posts.php?author=<?= $post_author; ?>&p_id=<?= $post_id; ?>"><?= $post_author ?></a>
                        </p>


                        <p><span class="glyphicon glyphicon-time"></span><?= $post_date ?></p>
                        <hr>

                        <a href="post.php?p_id=<?= $post_id ?>"><img class="img-responsive" src="/images/<?php echo $post_image ?>" alt=""></a>

                        <hr>
                        <p><?= $post_content ?></p>
                        <a class="btn btn-primary" href="post.php?p_id=<?= $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>

                <?php }  
 }} ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include './includes/sidebar.php'  ?>

        </div>
        <!-- /.row -->

        <hr>

        <ul class="pager">
            <?php
            for ($i = 1; $i <= $count; $i++) {
                if($i == $page){
                    echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";
                } else {
echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                }
                
            }

            ?>
        </ul>

        <?php include './includes/footer.php'  ?>