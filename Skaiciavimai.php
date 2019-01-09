<?php
$y = 5;
$x = 6;

if ($x == $y) {
    echo "Lygu<br>";
} else {
    echo "Nelygu<br>";
}

echo "<hr>";

$kol = 1;
while($kol <= 5) {
    echo "Skaicius yra: $kol<br>";
    $kol++;
}

echo "<hr>";

do {
    echo "The number is: $kol <br>";
    $kol++;
} while ($kol <= 10);

echo "<hr>";

for ($i = 0; $i < 10; $i++) {
    echo "Kintamojo 'i' reiksme: $i <br>";
}

echo "<hr>";

$colors = [
    [
        "code" => "#ff0000",
        "name" => "RED"
    ],
    [
        "code" => "#00ff00",
        "name" => "GREEN"
    ],
    [
        "code" => "#0000ff",
        "name" => "BLUE"
    ],
    [
        "code" => "yellow",
        "name" => "GELTONA"
    ],
];

foreach ($colors as $element) {
    echo "<span style='color: ".$element['code']."'>".$element['name']."</span> ";
}