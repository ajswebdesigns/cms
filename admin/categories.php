<?php include('includes/admin_header.php') ?>
<div id="wrapper">
  <!-- Navigation -->
  <?php include('includes/admin_navigation.php') ?>
  <div id="page-wrapper">
    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">
            Welcome to ADMIN
            <small>Author Name</small>
          </h1>
          <div class="col-xs-6">
            <!-- Create Query -->
            <?php insert_categories(); ?>
            <!-- Create Form -->
            <form action="" method="post">
              <div class="form-group">
                <label for="cat_title">Add Category</label>
                <input id="cat_title" class="form-control" type="text" name="cat_title">
              </div>
              <div class="form-group">
                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
              </div>
            </form>
            <?php //Update and include Query
            updateCategories();
            ?>
          </div>
          <!-- add category form -->
          <div class="col-xs-6">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Category Title</th>
                </tr>
              </thead>
              <tbody>
                <?php //delete Query
                deleteCategories();
                ?>
                <!--Find All Categories Query   -->
                <?php
                findAllCategories();
                ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->
  <!--  Footer -->
  <?php include('includes/admin_footer.php') ?>