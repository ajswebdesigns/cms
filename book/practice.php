<?php

$cities = [
  'Fenton' => '12263 Center Road, Fenton MI 48430',
  'GrandBlanc' => '546 E Reid Road, Grand Blanc MI 48439',
  'Davison' => '7324 River Rock Drive, Davison MI 48423',
];
// echo $cities['Fenton'];


$city = $_GET['city'];
$address = $cities[$city];
?>

<?php foreach($cities as $key => $value){?>
  <a href="get-1.php?city=<?=$key ?>"><?= $key ?></a>
<?php }

?>
<h1><?= $city ?></h1>
<h1><?= $address ?></h1>
