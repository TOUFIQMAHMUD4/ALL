<?php
// Associative Array: Country and Capital
$countries_and_capitals = array(
    "Bangladesh" => ["Dhaka"],
    "India" => ["Delhi"],
    "United States" => ["New York"],
    "United Kingdom" => ["London"],
    "Australia" => ["Sydney"],
    "Canada" => ["Toronto"],
    "China" => ["Beijing"]
);
    

// Output the associative array

foreach ($countries_and_capitals as $country => $capitals) {
    echo "Country: $country<br>";
    echo "Capitals: " . implode(", ", $capitals) . "<br><br>";
}
?>