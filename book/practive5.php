<?php


$cities = [
  'Fenton'      => '12263 Center Road, Fenton MI 48430',
  'Grand_Blanc' => '546 E Reid Road Grand Blanc MI 48439',
  'Davison'     => '7324 River Rock Drive,Davison MI 48423',
];



$city = $_GET['city'] ?? '';
$valid = array_key_exists($city, $cities);
if($valid) {
  $address = $cities[$city];
} else {
  $address = 'Please select a city';
}
?>
<!-- //Loop over all cities -->
<?php foreach($cities as $key=> $city) { ?>
  <a href="practive5.php?cities=<?= $key ?>"><?= $key ?></a>
  
<?php } ?>


<h1><?= $city ?></h1>
<h3><?= $address ?></h3>





sa






<!-- 
<script>
  let age = 21;
  age >= 21 ? console.log('You may drink'): console.log('Must be 21 or older to drink');

</script> -->
