<?php
function deleteProduct($mysql, $id) {

    // make query
    $query = "DELETE FROM products WHERE productID = $id;";

    // excute query
    $result = mysqli_query($mysql, $query);

    return $result;
}
?>
