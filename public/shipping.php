<?php
header("Content-Type: application/json");
require_once '../vendor/shippo/shippo-php/lib/Shippo.php';

Shippo::setApiKey('ec502c2500a67409a50147a41632277ba433421f');

$length = $_POST['length'];
$width= $_POST['width'];
$height = $_POST['height'];
$weight = $_POST['weight'];

$from_street = $_POST['from_street1'];
$from_city = $_POST['from_city'];
$from_state = $_POST['from_state'];
$from_zip = $_POST['from_zip'];

$to_street = $_POST['to_street1'];
$to_city = $_POST['to_city'];
$to_state = $_POST['to_state'];
$to_zip = $_POST['to_zip'];

// example fromAddress
$fromAddress = array(
    // 'object_purpose' => 'PURCHASE',
    'object_purpose' => 'QUOTE',
    'name' => 'Mr Hippo"',
    'company' => 'Shippo',
    'street1' => $from_street,
    'city' => $from_city,
    'state' => $from_state,
    'zip' => $from_zip,
    'country' => 'US',
    'phone' => '+1 555 341 9393',
    'email' => 'mr-hippo@goshipppo.com'
    );

// example fromAddress
$toAddress = array(
    'object_purpose' => 'QUOTE',
    'name' => 'Ms Hippo"',
    'company' => 'San Diego Zoo"',
    'street1' => $to_street,
    'city' => $to_city,
    'state' => $to_state,
    'zip' => $to_zip,
    'country' => 'US',
    'phone' => '+1 555 341 9393',
    'email' => 'ms-hippo@goshipppo.com');

// example parcel
$parcel = array(
    'length'=> $length,
    'width'=> $width,
    'height'=> '5',
    'distance_unit'=> 'in',
    'weight'=> $weight,
    'mass_unit'=> 'lb',
);

// example Shipment object
$shipment = Shippo_Shipment::create(
array(
    'object_purpose'=> 'QUOTE',
    'address_from'=> $fromAddress,
    'address_to'=> $toAddress,
    'parcel'=> $parcel,
    'async'=> false
));


if (isset($shipment['rates_list'])) {
    
    $response = array();
    $count = count($shipment['rates_list']);
    
    if ($count > 1) {
        $count = 1;
    }
    
    for ($x = 0; $x < $count; $x++) {
        $rate = $shipment['rates_list'][$x];
        
        $r = array(
            'amount' => sprintf("%01.2f", $rate['amount'] * 1.1),
            'provider' => $rate['provider'],
            'service_level' => $rate['servicelevel_name'],
            'provider_image' => $rate['provider_image_75']        
        );
        
        $response[] = $r;
        

    }       
    
} else {
    $response = false;
}

echo json_encode($response); exit;

if (isset($shipment['rates_list'][2])) {
    $rate = $shipment['rates_list'][2];
    $amount = $rate["amount"];
    $provider = $rate["provider"];
    
    echo json_encode(array("rate" => $amount, "provider" => $provider,
        "service_level" => $rate['servicelevel_name'],
        "provider_image" => $rate['provider_image_75'],

        (array)$rate));


     
} else {
    echo json_encode(false);
}
?>
