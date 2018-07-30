<?php

// setting page content to json (if you just want to display json for some reason)
//header("Content-Type:application/json");

$baseUrl = "https://swapi.co/api/";

$peopleUrl = $baseUrl . "people/";

// ch -> curl handler
// curl fetches data from url
$ch = curl_init($peopleUrl);
//$ch = curl_init($baseUrl);

// disable auto display for curl not sure this is working
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// execute the fetching and saving to a variable
$results = curl_exec($ch);


$data = json_decode($results);

foreach ($data->results as $item) {
  echo $item->name . "<br />";
}

// get all pages of vehicles into 1 page
// not working
/*
$vehiclesResult = null;

for ($i=1; $i < 50 ; $i++) {
  $vehicleUrl = $baseUrl . "vehicles/?page=" . $i;
  $ch = curl_init($vehicleUrl);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

  if ($ch == null) {
    curl_close($ch);
    break;
  }
  $vehiclesResult = $vehiclesResult . curl_exec($ch);
  curl_close($ch);
}

$vehiclesData = json_decode($vehiclesResult);

foreach ($vehiclesData->results as $item) {
  echo $item->name . "<br />";
}

*/


//$array = json_decode($results);

// print_r prints variable contents
//print_r($data);


// close curl
curl_close($ch);



?>
