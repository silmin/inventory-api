<?php
function indexProducts($mysql) {

    // make query
    $pi = "SELECT products.productID, shopID, title, description, price
            FROM products";
    
    $query = "SELECT *, shops.name FROM ($pi) as PI, shops
                WHERE PI.shopID = shops.shopID;";
    
    // todo: join images table

    echo $query;
   
    $result = mysqli_query($mysql, $query);
    echo mysqli_error($mysql);

    return $result;
}
?>
