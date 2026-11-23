<?php
$host='localhost';
$user='root';
$password='';
$database='';

$conn= @new mysqli($host,$user,$password,$database);
if(!$conn){
    die('Błąd połączenia' .mysqli_connect_error());
}





?>