  <?php
        if(isset($_GET['source'])){
          $source = $_GET['source'];
        } else {
          $source = '';
        }

        switch($source){
          case 'create': 
           echo 'create post';
          break;

          case 'update': 
          echo 'update post';
          break;

          case '300': 
          echo "Nice 300";
          break;

          case '3000': 
          include "../book/send.php";
          break;


        default: 
      echo 'grr';
        }