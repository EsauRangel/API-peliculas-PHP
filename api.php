<?php
include_once "functions.php";

$function = new Functions();



if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $function->get();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $function->post();
}

if($_SERVER['REQUEST_METHOD'] == 'PUT'){
       $function->put();
}

if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
    $function->delete();
}

header("HTTP/1.1 400");
?>