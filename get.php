<?php
function getProduct($mysql, $id) {
    // make query
    $pi = "SELECT products.productID, shopID, title, description, price
            FROM products";
    
    $query = "SELECT *, shops.name FROM ($pi) as PI, shops
                WHERE PI.shopID = shops.shopID AND productID = $id";

    $result = mysqli_query($mysql, $query);
    echo mysqli_error($mysql);

    return $result;
}
?>
