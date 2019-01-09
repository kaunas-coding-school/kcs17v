<?php

namespace KCS;

class Render
{
    function renderArray(array $mas) {
        foreach ($mas as $raktas => $reiksme) {
            echo "Raktas: ".$raktas." Reiksme: ".$reiksme. "<br>";
        }
    }
}
