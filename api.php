<?php
header('Access-Control-Allow-Origin: *');

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
include ('shopIndex.php');
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

    if (isset($_GET['line']) && $request[0] === "search") {
        // search
        $words = explode(' ', $_GET['line']);
        $result = searchProducts($mysql, $words);
    } else if (isId($id)) {
        // get a product
        $result = getProduct($mysql, $id);
    } else {
        if ($request[0] === "shop") {
            // shop index
            $result = indexShops($mysql);
        } else {
            // index
            $result = indexProducts($mysql);
        }
    }
    if ($result) $response = convert2Json($result);
    else $response = 'Fail: ' . mysqli_error($mysql);
    break;

case 'POST':
    // insert
    $result = insertProduct($mysql, $input);
    if ($result) $response = 'Accept.';
    else $response = 'Fail: ' . mysqli_error($mysql);
    break;

case 'PUT':
    // update
    $result = updateProduct($mysql, $input);
    if ($result) $response = 'Accept.';
    else $response = 'Fail: ' . mysqli_error($mysql);
    break;

case 'DELETE':
    // delete
    $result = deleteProduct($mysql, $input['productID']);
    if ($result) $response = 'Accept.';
    else $response = 'Fail: ' . mysqli_error($mysql);
    break;
}

echo $response;

?>
