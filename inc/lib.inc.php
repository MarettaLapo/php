<?php
require "..\\site_php\\inc\\config.inc.php"; 

function sql($sql){
    $stmt = mysqli_prepare($link, $sql);
    $stmt->bind_param( 'i', $_GET["id"]);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row;
}
function price($string){
    $new_string = explode(".", $string);
    if ($new_string[1] == "00") {
        $output = $new_string[0];
    }
    else{
        $output = implode(".", $new_string);
    }
    return $output;
}

