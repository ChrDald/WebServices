<?php

require_once("functions.php");

// check for GET method
// case sensitive
if ($_SERVER["REQUEST_METHOD"] == "GET") {

  // you have to either use arrays in arrays to encode to json, or use an object
  //header("Content-Type:application/json");

  $people = array(
    array ("id" => "1","name" => "Steve Jobs","company" => "Apple"),
    array ("id" => "2","name" => "Steve Works","company" => "Apple"),
    array ("id" => "3","name" => "Steve Potatos","company" => "Apple")
  );


  // if you specify an id
  if (isset($_GET["id"])) {

  // first array name , next is the item variable you want for items in the array
    foreach ($people as $item) {

      
      $validId = false;

      if ($_GET["id"] == $item["id"]) {

        $validId = true;

        $data = array("Person"=>$item, "Links"=>createLinks("?id=" . $item["id"]));

        response($data);

        /*
        $json_person = json_encode(
          array("Person"=>$item, "Links"=>createLinks("?id=" . $item["id"]))
          );

        echo $json_person;
        */
        return;

      }
    }
    if ($validId == false) {
      header("Content-Type:text");
      echo "Invalid user id";
    }
  }
}
else {

  $data = array("Person"=>$people, "Links"=>createLinks());

  response($data);
  /*
  // return all people
  //$links = array("rel" => "self","href" => "localhost:8080/WebServices1");


  $json_array = json_encode(
    array("People"=>$people, "Links"=>$links)
  );
  //echo $json_array;
  return;
  */
}

// if the id parameter is given, return a specific person


  /*
  // json_encode  Returns a string containing the JSON representation of the supplied value.
  $json_people = json_encode($people);

  // change the content type of the response

  */
