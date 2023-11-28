<?php
$search_url = "https://nominatim.openstreetmap.org/search?q=". urlencode("Santiago
de Compostela").",Spain&format=json";
$httpOptions = [
"http" => [
"method" => "GET",
"header" => "User-Agent: Nominatim-Test"
]
];

$streamContext = stream_context_create($httpOptions);
$json = file_get_contents($search_url, false, $streamContext);
print_r($json);
echo "<br>";
echo "json=" . $json;
echo "<br>";
$decoded = json_decode($json, true);
$lat = $decoded[0]["lat"];
$lng = $decoded[0]["lon"];
echo "<br>";
echo " latitude=".$lat . " -----" . "lonxitude=".$lng;