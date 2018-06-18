<?php
header("Content-type: application/json");

$router->add('/',function() {
    echo "Running";
});

$router->add('/about-us',function(){
    echo "about-us";
});