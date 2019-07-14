<?php
// get to method, path, body
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));
$input = json_decode(file_get_contents('php://input'), true);

// connect to database
include ('dbdata.php');

$mysql = mysqli_connect($hostname, $username, $password, $dbname);
if (mysqli_connect_errno()) {
    printf("Connect faild: %s\n", $mysql->connect_errno);
    exit();
}
mysqli_set_charset($mysql, 'utf8');

include ('search.php');
include ('convert_to_json.php');

// switch by method
switch ($method) {
case 'GET':
    if (isset($_GET['line'])) {
        // search
        $words = explode(' ', $_GET['line']);
        $result = searchProducts($mysql, $words);
        $response = convert2Json($result);
        echo $response;
    } else {

    }
    break;

case 'POST':
    break;

case 'PUT':
    break;

case 'DELETE':
    break;
}

?>
