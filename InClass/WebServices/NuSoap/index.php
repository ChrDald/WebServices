<?php
// basic service, see method below.
// using nuSoap to generate service WSDL


// include the nuSoap library
// if you put the @ sign, errors will not be displayed
// require means it will crash if resource not loaded
// require_once will not try to reload the resource if already loaded, without _once script will crash
// same thing for include, in that case if resource not loaded script will not crash

//@require("lib/nusoap.php");
require("lib/nusoap.php");


// take a stock name, return the price if found (in this case hard coded array, as opposed to database)
function stockPrice($stock_name) {
    $stocks = array("IBM" => 12.99, "Apple" => 1.99, "Fbook" => 0.01);

    foreach ($stocks as $name => $price) {
        if ($stock_name == $name) {
            return $price;
        }
    }

    return -1;
}

// soap_server is a class in the library
$server = new soap_server();

// all these methods are from the library
// start configuring the WSDL for the soap server
$server->configureWSDL("server");

// register the method to the soap server (the input and outputs need to be arrays, probably so you can have multiple ones)
$server->register("stockPrice",                     // method name
                array("stock_name" => "xsd:string"), // input parameter
                array("stock_price" => "xsd:decimal") // output type
            );

// php://input is a built in php function that gets all raw POST data sent to the page
$server->service(file_get_contents("php://input"));



?>