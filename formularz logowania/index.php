<?php
Session_start();



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sebastian Matyjaszczyk</title>
</head>
<body>
    <form action='zaloguj.php' method='post'>
        login:<input type='text' name='login'>
        <br><br>
        hasło:<input type='password' name='haslo'>
        <br><br>
        <input type='submit' value='Zaloguj'>
</form>
<?php
if(isset($_SESSION['blad'])){
echo $_SESSION['blad'];

}

?>
</body>
</html>