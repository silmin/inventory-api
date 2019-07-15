<?php
function updateProduct($mysql, $data) {

    // make query
    $query = "UPDATE products 
              SET title = '${data['title']}', price = ${data['price']}";

    if (isset($data['shopID'])) {
        $query .= ", shopID = ${data['shopID']}";
    }
    if (isset($data['description'])) {
        $query .= ", description = '${data['description']}'";
    }

    $query .= "WHERE productID = ${data['productID']};";

    $result = mysqli_query($mysql, $query);

    return $result;
}
?>
