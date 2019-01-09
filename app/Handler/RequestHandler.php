<?php

namespace KCS\Handler;

class RequestHandler
{
    private $arr;

    public function __construct()
    {
        $this->arr = [];
    }

    public function handle()
    {
        if (!empty($_POST['vardas'])) {
            $this->arr['vardas'] = $_POST['vardas'];
        }
        if (!empty($_POST['pastas'])) {
            $this->arr['pastas'] = $_POST['pastas'];
        }
        if (!empty($_POST['zinute'])) {
            $this->arr['zinute'] = $_POST['zinute'];
        }
        return $this->arr;
    }
}
