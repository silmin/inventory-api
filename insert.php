<?php
function insertProduct($mysql, $data) {

    // make query
    $format = "INSERT INTO products (%s) values (%s);";
    $column = "title, price";
    $value = "'${data['title']}', ${data['price']}";

    if (isset($data['shopID'])) {
        $column .= ", shopID";
        $value .= ", ${data['shopID']}";
    }
    if (isset($data['description'])) {
        $column .= ", description";
        $value .= ", '${data['description']}'";
    }

    $query = sprintf($format, $column, $value);

    $result = mysqli_query($mysql, $query);

    return $result;
}
?>
