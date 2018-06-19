<?php
header("Content-type: application/json");

$router->add('/healthcheck','HealthCheckController#getStatusServer');
$router->add('/cpf', 'CpfController#getCpf');

$router->dispatch();