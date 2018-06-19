<?php
header("Content-type: application/json");

$router->add('/healthcheck','HealthCheckController#getStatusServer');

$router->add('/about-us',function() {
    echo json_encode(['status'=> 200]);
});

$router->dispatch();