<?php

// setting page content to json (if you just want to display json for some reason)
//header("Content-Type:application/json");

// chuck norris simple get api...
// random (no parameters)
$url = "https://api.chucknorris.io/jokes/random";

/*
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$results = curl_exec($ch);

$data = json_decode($results);

$values = $data->value;
*/

// by categories

// get all categories
$categories_url = "https://api.chucknorris.io/jokes/categories";
$ch = curl_init($categories_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$results = curl_exec($ch);
$data = json_decode($results);


print_r($data);

/*
$categoryUrl = jokeByCategory("explicit");

$ch = curl_init($categoryUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$results = curl_exec($ch);

$data = json_decode($results);

$values = $data->value;
*/



function jokeByCategory ($category = null) {

  $url = "https://api.chucknorris.io/jokes/random";

  if ($category == null) {
    return;
  }
  $categoryUrl = $url . "?category=" . $category;
  return $categoryUrl;
}

// trying to do it multiple times
// it works
/*
$results = curl_exec($ch);
$data = json_decode($results);
$values = $values . "<br />" . $data->value;
*/

//print_r($data);
//echo $data->value;

curl_close($ch);

?>

<html>
  <head>
    <style>
      .content {
        width: 80%;
        margin: 0 auto;
        text-align: center;
        border: 1px solid black;
      }
    </style>
  </head>
  <body>
    <div class="content">
    <h1><?php echo $values ?></h1>


  </body>
