<?php
function searchProducts($mysql, $words) {

    // make query
    $pi = "SELECT products.productID, shopID, title, description, price
            FROM products";
    
    $query = "SELECT *, shops.name FROM ($pi) as PI, shops
                WHERE PI.shopID = shops.shopID AND (";
    
    // todo: join images table

    foreach ($words as $word) {
        $word = htmlspecialchars($word);
        $query .= "PI.title LIKE '%$word%'";
        if ($word !== end($words)) {
            $query .= " OR ";
        } else {
            $query .= ");";
        }
    }

    echo $query;
    
    $result = mysqli_query($mysql, $query);
    echo mysqli_error($mysql);

    return $result;
}
?>
