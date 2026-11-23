<?php
$host='localhost';
$user='root';
$password='';
$database=''; //Wstaw tutaj nazwę bazy

$conn= @new mysqli($host,$user,$password,$database);
if(!$conn){
    die('Błąd połączenia' .mysqli_connect_error());
}






?>
