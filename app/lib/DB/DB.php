<?php

namespace KCS\lib\DB;

use KCS\Model\Person;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class DB
{
    private $host;
    private $dbname;
    private $user;
    private $password;
    private $conn;
    private $logger;

    public function __construct(
        $host = 'localhost',
        $dbname = 'applikacija',
        $user = 'app_user',
        $password = 'pass'
    )
    {
        try{
            $this->host = $host;
            $this->dbname = $dbname;
            $this->user = $user;
            $this->password = $password;
            if (!$this->conn) {
                $this->conn = new \PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            }
        } catch (\PDOException $exception){
            $this->logger = new Logger('name');
            $this->logger->pushHandler(new StreamHandler('app.log', Logger::WARNING));
            $this->logger->addCritical($exception->getMessage());
            throw new \Exception('Klaida jungiantis į DB.');
        }
    }

    public function showAllPersons()
    {
        $stmt = $this->conn->prepare('SELECT * FROM person LIMIT 10');
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, Person::class);
        $rezultatai = $stmt->fetchAll();

        return $rezultatai;
    }

    function saugotiIDB(array $mas)
    {
        $stmt = $this->conn->prepare('INSERT INTO person (first_name, email) values (:fname, :email)' );
        $stmt->bindValue(':fname', $mas['vardas']);
        $stmt->bindValue(':email', $mas['pastas']);
        $stmt->execute();
    }

    public function updatePerson(Person $person)
    {
        $sql = "UPDATE person SET first_name = :fname, last_name= :lname, email = :email, phone = :phone WHERE id = :id ;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $person->getId());
        $stmt->bindValue(':fname', $person->getFirstName());
        $stmt->bindValue(':lname', $person->getLastName());
        $stmt->bindValue(':email', $person->getEmail());
        $stmt->bindValue(':phone', $person->getPhone());
        $stmt->execute();
    }

    public function getPersonById($id): Person
    {
        $stmt = $this->conn->prepare('SELECT * FROM person WHERE id = '.$id);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, Person::class);

        return $stmt->fetch();
    }

    public function deletePersonById($personId)
    {
        $stmt = $this->conn->prepare('DELETE FROM person WHERE id = '.$personId);
        $stmt->execute();

        header('Location: /');
    }
}
