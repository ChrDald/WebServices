<?php
// create links for restfulness

function createLinks($arg = "") {

  $links = array("rel" => "self","href" => "localhost:8080/WebServices1" . $arg);

  return $links;
}

function response($data, $status = 400) {

  header("Content-Type:application/json");
  header("HTTP/1.1 " . $status);
  $json_data = json_encode($data);
  echo $json_data;
}
