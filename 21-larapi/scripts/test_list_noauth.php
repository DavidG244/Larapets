<?php
$url = 'http://127.0.0.1:8000/api/pets/list';
$options = [
    'http' => [
        'header'  => "Accept: application/json\r\n",
        'method'  => 'GET',
        'ignore_errors' => true,
    ],
];
$context  = stream_context_create($options);
$result = @file_get_contents($url, false, $context);
foreach ($http_response_header as $h) { echo $h . "\n"; }
echo "\nBody:\n" . ($result ?: '') . "\n";
