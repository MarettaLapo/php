<?php
const DB_HOST = "localhost";
const DB_LOGIN = "root";
const DB_PASSWORD = "";
const DB_NAME = "db_form";

$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
function addForm($name, $email, $year, $sex, $theme, $question){
    global $link;
    $sql = "insert into form (name, email, year, sex, theme, question)
    values (?, ?, ?, ?, ?, ?)";
    if(!$stmt = mysqli_prepare($link, $sql))
        return false;
    mysqli_stmt_bind_param($stmt, "ssisss", $name, $email, $year, $sex, $theme, $question);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}
function clearStr($str){
    global $link;
    $str = trim(strip_tags($str));
    return mysqli_real_escape_string($link, $str);
}
function clearInt($val){
    global $link;
    return abs((int)$val);
}