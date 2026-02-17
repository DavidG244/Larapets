<?php
$url = 'http://127.0.0.1:8000/api/auth/login';
$data = ['email' => 'david72ty@gmail.com', 'password' => 'secret123'];
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
echo "HTTP response:\n";
foreach ($http_response_header as $h) {
    echo $h . "\n";
}
echo "\nBody:\n";
echo $result;
