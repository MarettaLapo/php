<?php
const DB_HOST = "localhost";
const DB_LOGIN = "root";
const DB_PASSWORD = "";
const DB_NAME = "db_site";


$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}

function sql($sql){
    global $link;
    if(!$stmt = mysqli_prepare($link, $sql)){
        http_response_code(404);
        include('..//404.php');
        die();
    }
    mysqli_stmt_bind_param($stmt, 'i', $_GET["id"]); //isset??
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return $result;
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
?>