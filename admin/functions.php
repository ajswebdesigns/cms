<?php
// Add New Category Query
function insert_categories()
{
  global $connection;
  if (isset($_POST['submit'])) {
    $cat_title = $_POST['cat_title'];
    if ($cat_title == "" || empty($cat_title)) {
      echo 'This field should not be empty';
    } else {
      $query = "INSERT INTO categories(cat_title)";
      $query .= "VALUE('$cat_title')";
      $create_category_query = mysqli_query($connection, $query);
      if (!$create_category_query) {
        die();
      }
    }
  }
}
// Select All Categories Query
function findAllCategories()
{
  global $connection;
  $query = "SELECT * FROM categories";
  $select_categories = mysqli_query($connection, $query);

  //display Categories Query 
  while ($row = mysqli_fetch_assoc($select_categories)) {
    // var_dump($row);
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
    echo "<tr>";
    echo "<td>  $cat_id</td>";
    echo "<td>  $cat_title</td>";
    echo "<td> <a href='categories.php/?delete={$cat_id}'>Delete</a></td>";
    echo "<td><a href='categories.php?edit={$cat_id}'>Update</a></td>";
    echo "</tr>";
  }
}

// Delete Categories Query
function  deleteCategories()
{
  global $connection;
  if (isset($_GET['delete'])) {
    $the_cat_id = $_GET['delete'];
    $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
    $delete_query = mysqli_query($connection, $query);
    // refresh page after delete
    header("Location: http://localhost:8888/admin/categories.php");
  }
}

function updateCategories()
{
  global $connection;
  if (isset($_GET['edit'])) {
    $cat_id = $_GET['edit'];
    include('./includes/update_categories.php');
  }
}
