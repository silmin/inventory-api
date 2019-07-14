<?php
function searchProducts($mysql, $words) {

    // make query
    $query = "SELECT * FROM products, images 
                WHERE products.productID = images.productID";
    foreach ($words as $word) {
        $word = htmlspecialchars($word);
        $query .= " OR products.title LIKE '%$word%'";
    }
    
    //echo $query;

    $result = mysqli_query($mysql, $query);

    return $result;
}
?>
