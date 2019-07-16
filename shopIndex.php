<?php
function indexShops($mysql) {

    // make query
    $query = "SELECT * FROM shops";
    
    // excute query
    $result = mysqli_query($mysql, $query);

    return $result;
}
?>
