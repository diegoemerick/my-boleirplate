<?php
header("Content-type: application/json");

//use Application\Controller\CpfController;

$router->add('/',function() {
    echo "Running";
});

$router->add('/about-us',function() {
    echo json_encode(['status'=> 200]);
});

//$router->add('/cpf',function(){
//    return CpfController::getCpf();
//});

$router->dispatch();