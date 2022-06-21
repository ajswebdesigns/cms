<?php

if(isset($_GET['p_id'])){
  $post_id = $_GET['p_id'];
  $query = "UPDATE posts WHERE post_id = $post_id SET post_views_count = 0";
  $reset_query = mysqli_query($connection,$query);
  if(!$reset_query){
    echo 'query failed to update';
  }
}