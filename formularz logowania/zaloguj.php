<?php
include polaczenie.php;
$login=$_POST['login'];
$haslo=$_POST['haslo'];

$sql="SELECT * FROM uzytkownicy WHERE uzytkownik='$login' AND haslo='$haslo'";
mysqli_query($conn,$sql);







$conn->close();
?>