<html>
<head>
    <title>Tai PHP kodas</title>
</head>
<body>
<header>
    <?php

    function duomenys()
    {
        return [
            "Italy" => "Rome",
            "Luxembourg" => "Luxembourg",
            "Belgium" => "Brussels",
            "Denmark" => "Copenhagen",
        ];
    }

    function spausdintiMeniu($duomenys)
    {
        echo "<ul>";
        foreach ($duomenys as $raktas => $verte) {
            echo "<li><a href='#$verte'>$raktas</a></li>";
        }
        echo "</ul>";
    }

    $mas = duomenys();
    spausdintiMeniu($mas);

    ?>
</header>
<main>
    <h1>CAR</h1>
    <?php

    require __DIR__ . '\vendor\autoload.php';

    $automobilis = new \KCS\Model\Car();
    $automobilis->spalva = 'Raudona';
    echo $automobilis->gautiSpalva() . "<br>";
    $valandos = 5;
    $y = 0;
    for ($x = 0; $x < $valandos; $x++) {
        $y += 10;
        $automobilis->greitis = $y . 'km\h';
        $automobilis->vaziuoti();
    }
    echo "<br>Rida: " . $automobilis->gautiRida();

    echo "<hr>";
    try {
        $db = new \KCS\lib\DB\DB();

        $persons = $db->showAllPersons( );
        //    var_dump($test);

        /** @var \KCS\Model\Person $person */
        foreach ($persons as $person) {
            echo
                "[<a href='editPerson.php?id={$person->getId()}'>Redaguoti</a>] "
                ."[<a href='deletePerson.php?id={$person->getId()}'>Trinti</a>] "
                . $person->getFirstName() . " " . $person->getLastName() . "<br>";
        }
    } catch (\Exception $e) {
        echo 'Err..';
    }


    ?>
</main>
<footer>
    Visos teisės saugomos &copy;2018
</footer>
</body>
</html>