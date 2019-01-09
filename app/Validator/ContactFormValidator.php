<?php

namespace KCS\Validator;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class ContactFormValidator
{
    public $log;

    public function __construct()
    {
        $this->log = new Logger('name');
        $this->log->pushHandler(new StreamHandler('app.log', Logger::WARNING));
    }

    public function validate(array $arr) {
        if (empty($arr['vardas'])) {
            $this->spausdintiKlaida('reikia vardo');
        }
        if (empty($arr['pastas'])) {
            $this->spausdintiKlaida('iveskite pasta');
        }
        if (empty($arr['zinute'])) {
            $this->spausdintiKlaida('zinute');
        }
    }

    function spausdintiKlaida($klaida){
        $errMessage = "Klaida: $klaida<br>";
        echo $errMessage;
        $this->log->addWarning($errMessage);
    }
}