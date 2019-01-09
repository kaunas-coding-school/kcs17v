<?php

require __DIR__ . '\vendor\autoload.php';

try{
    $id = $_POST['id'];

    $db = new \KCS\lib\DB\DB();

    $person = $db->getPersonById($id);

    $person->setEmail($_POST['email']);
    $person->setLastName($_POST['last_name']);
    $person->setFirstName($_POST['first_name']);
    $person->setPhone($_POST['phone']);

    $db->updatePerson($person);

    header('Location: /');

} catch (\Exception $e) {
    echo 'Klaida naujinant asmeni.';
}

