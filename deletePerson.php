<?php
require __DIR__ . '\vendor\autoload.php';
$db = new \KCS\lib\DB\DB();

try {
    $personId = $_GET['id'];

    if (empty($personId)) {
        throw new \Exception('Nera Asmens ID');
    }

    $person = $db->deletePersonById($personId);

} catch (\Exception $e) {
    echo 'Klaida...';
}

?>