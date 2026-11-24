<?php
session_start();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sebastian Matyjaszczyk</title>
</head>
<body>
    <?php
    echo<<<END
     '<p>Witaj' .$_SESSION['uzytkowik'].'!';
    <br><br>
    '<p>Należysz do frakcji' .$_SESSION['frakcja'];
    <br><br>
    '<p>Twoja siła:' .$_SESSION['sila'];
    <br><br>
    '<p>Twoja zrecznosc:' .$_SESSION['zrecznosc'];
    <br><br> 
    '<p>Twój poziom:' .$_SESSION['poziom'];


    END;


    ?>
</body>
</html>