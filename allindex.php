<?php
function indexProducts($mysql) {

    // make query
    $pi = "SELECT products.productID, shopID, title, description, price
            FROM products";
    
    $query = "SELECT *, shops.name FROM ($pi) as PI, shops
                WHERE PI.shopID = shops.shopID;";
    
    // todo: join images table

   
    // excute query
    $result = mysqli_query($mysql, $query);

    return $result;
}
?>
