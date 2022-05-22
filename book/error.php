<?php


$cities = [
  'Fenton'      => '12263 Center Road, Fenton MI 48430',
  'Grand_Blanc' => '546 E Reid Road Grand Blanc MI 48439',
  'Davison'     => '7324 River Rock Drive,Davison MI 48423',
];



$valid = array_key_exists($city, $cities);
echo $valid;



if(!$valid){
  http_response_code(404);
  header('Location: page-not-found.php');
  exit;
}



?>

<!-- //Loop over all cities -->
<?php foreach($cities as $key=> $city) { ?>
  <a href="practive5.php?cities=<?= $key ?>"><?= $key ?></a>
  
<?php } ?>


<h1><?= $city ?></h1>
<h3><?= $address ?></h3>








