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
include ('allindex.php');
include ('get.php');
include ('insert.php');
include ('update.php');
include ('delete.php');
include ('convert_to_json.php');
include ('isJudge.php');


// switch by method
switch ($method) {
case 'GET':
    if (isset($request)) $id = intval($request[0]);

    if (isset($_GET['line'])) {
        // search
        $words = explode(' ', $_GET['line']);
        $result = searchProducts($mysql, $words);
        $response = convert2Json($result);
    } else if (isId($id)) {
        // get a product
        $result = getProduct($mysql, $id);
        $response = convert2Json($result);
    } else {
        // index
        $result = indexProducts($mysql);
        $response = convert2Json($result);
    }
    break;

case 'POST':
    $result = insertProduct($mysql, $input);
    if ($result) $response = 'Accept.';
    else $response = 'Fail: ' . mysqli_error($mysql);
    break;

case 'PUT':
    $result = updateProduct($mysql, $input);
    if ($result) $response = 'Accept.';
    else $response = 'Fail: ' . mysqli_error($mysql);
    break;

case 'DELETE':
    $result = deleteProduct($mysql, $input['productID']);
    if ($result) $response = 'Accept.';
    else $response = 'Fail: ' . mysqli_error($mysql);
    break;
}

echo $response;

?>
