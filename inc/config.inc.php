<?php
const DB_HOST = "localhost";
const DB_LOGIN = "root";
const DB_PASSWORD = "";
const DB_NAME = "db_site";


$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
    http_response_code(404);
    include('..//404.php');
    die();
}

function sql($str){
    global $link;
    $i = ($_GET['id']);
    if(intval($i)){
        $stmt = $link ->stmt_init();
        if($stmt->prepare($str) === false or $stmt->bind_param('i', $i) === false
        or $stmt->execute() === false or ($result = mysqli_stmt_get_result($stmt)) === false){
            http_response_code(404);
            include('..\\site_php\\404.php');
            die();
        }
        else{
            return $result;
        }  
    }else{
        http_response_code(404);
        include('..\\site_php\\404.php');
        die();
    }  
}
function price($string)
{
    $new_string = explode(".", $string);
    if ($new_string[1] == "00") 
    {
        $output = $new_string[0];
    }
    else
    {
        $output = implode(".", $new_string);
    }
    return $output;
}