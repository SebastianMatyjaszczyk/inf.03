<?php
Session_start();
include polaczenie.php;
$login=$_POST['login'];
$haslo=$_POST['haslo'];

$sql="SELECT * FROM uzytkownicy WHERE uzytkownik='$login' AND haslo='$haslo'";
if($rezultat=@$conn->query($sql)){
  $ilu_userow = $rezultat->num_rows;
  if($ilu_userow==1){
    $wiersz=$rezultat->fetch_assoc();
    $_SESSION['uzytkownik']=$wiersz('uzytkownik');/*Nazwa kolumny w bazie
     i zarazem nazwa w tablicy asocjacyjnej
    
    */
    $_SESSION['poziom']=$wiersz('poziom');
    $_SESSION['sila']=$wiersz('sila');
    $_SESSION['zrecznosc']=$wiersz('zrecznosc');
    $_SESSION['frakcja']=$wiersz('frakcja');
    
    $rezultat->close();

    header('Location: gra.php');
  }else{
    header('Location: index.php')
  }
}







$conn->close();
?>