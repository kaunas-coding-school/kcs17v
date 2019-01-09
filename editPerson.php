<?php
require __DIR__ . '\vendor\autoload.php';
$db = new \KCS\lib\DB\DB();

try {
    $personId = $_GET['id'];

    if (empty($personId)) {
        throw new \Exception('Nera Asmens ID');
    }

    $person = $db->getPersonById($personId);

} catch (\Exception $e) {
    echo 'Klaida...';
}

?>

<form action="updatePerson.php" method="post">
    Vardas: <input type="text" name="first_name" value="<?php echo $person->getFirstName(); ?>"/><br/>
    Pavarde: <input type="text" name="last_name" value="<?php echo $person->getLastName(); ?>"/><br/>
    Pastas: <input type="text" name="email" value="<?php echo $person->getEmail(); ?>"/><br/>
    Tel:<input type="text" name="phone" value="<?php echo $person->getPhone(); ?>"/><br/>
    <input type="hidden" name="id" value="<?php echo $person->getId(); ?>"/><br/>
    <input type="submit" value="Saugoti">
</form>