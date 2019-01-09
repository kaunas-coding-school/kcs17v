<?php

require __DIR__ . '\vendor\autoload.php';

try{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $handler = new KCS\Handler\RequestHandler();
        $validator = new KCS\Validator\ContactFormValidator();
        $render = new \KCS\Render();
        $db = new \KCS\lib\DB\DB();

        $A = $handler->handle();
        $validator->validate($A);
        $render->renderArray($A);
        $db->saugotiIDB($A);
    } else {
        echo 'Netinkamas uzklausos metodas.';
    }
} catch (\Exception $e) {
    echo $e->getMessage();
}


