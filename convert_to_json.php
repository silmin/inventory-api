<?php
function convert2Json($result) {
    if ($result === false) return "Fail";

    $res = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $res[] = $row; 
    }
   
    return json_encode($res);
}
?>
