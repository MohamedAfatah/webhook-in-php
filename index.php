<?php

$token = '68e318b6-8e2e-4485-aaca-fd3b5e028217';

// check token in every request
if (!isset($_GET['token']) || $_GET['token'] !== $token) {
    header('HTTP/1.0 401 Unauthorized');
    exit();
}

// verification request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    exit($_GET['challenge']);
}

// access the body of a POST request
$data = json_decode(file_get_contents('php://input'));

header('Content-Type: application/json');

$response = array(
    // return custom attributes object
    // for test 
    'parameters' => array(
        'name' => 'Mohamed Ahmed',
        'mobile' => '01113245605',
        'Addrees'=>'15 May helwan mohamed ahmed str',
    ),
    // return responses
    'responses' => array(
        

        array(
            'type' => 'text',
            'elements' => array('Product has been added successfully. Your order summary:   ')
        ),
        array(
            'type' => 'text',
            'elements' => array('{{productName}} X {{productQuantity}} ')
        )
    
    )

);

echo json_encode($response);

?>