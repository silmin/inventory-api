<?php
// get to method, path, body
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));
$input = json_decode(file_get_contents('php://input'), true);


// connect to database
include ('dbdata.php');

$mysql = mysqli_connect($hostname, $username, $password, $dbname);
mysqli_set_charset($mysql, 'utf8');


// create sql
switch ($method) {
case 'GET':
    break;
case 'POST':
    break;
case 'PUT':
    break;
case 'DELETE':
    break;
}

?>
