<?php
$url = 'http://127.0.0.1:8000/api/pets/store';
$data = [
    'name' => 'ScriptPet',
    'kind' => 'Dog',
    'weight' => 5.2,
    'age' => 1,
    'breed' => 'Test',
    'location' => 'Local',
    'description' => 'Created by script'
];
$options = [
    'http' => [
        'header'  => "Content-Type: application/json\r\nAccept: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
        'ignore_errors' => true,
    ],
];
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
foreach ($http_response_header as $h) { echo $h . "\n"; }
echo "\nBody:\n" . $result . "\n";
