<?php
Session_start();

if(isset($_POST['email'])){
	
	$Poprawny_formularz = true;
	$nick = $_POST['nick'];
	if(strlen($nick<3 || $nick>20)){
		$Poprawny_formularz = false;
		$_SESSION['blad_nick'] = "Nickname musi mieć dlugosc od 3 do 20 znaków!";
	}
	if(ctype_alnum($nick==false)){
		$Poprawny_formularz = false;
		$_SESSION['blad_nick'] = "Nickname może skladać się tylko z liter i cyfr (bez polskich znaków)!";
	}
	
	$rejestracjahaslo = $_POST['rejestracjahaslo'];
	
	$email = $_POST['email'];
	$emailb = ($email, FILTER_SANITIZE_EMAIL);
	if(filter_var($emailb, FILTER_VALIDATE_EMAIL)==false;) || ($emailb!=$email)){
		$Poprawny_formularz = false;
		$_SESSION['blad_email'] = "Niepoprawny email!";
	}
	$haslo1 = $_POST['haslo1'];
	$haslo2 = $_POST['haslo2'];
	if(strlen($haslo1)<8 || strlen($haslo1>20)){
		$Poprawny_formularz = false;
		$_SESSION['blad_haslo'] = "Haslo musi się skladac od 8 do 20 znakow!";
	
	if($haslo1!=$haslo2){
		$Poprawny_formularz = false;
		$_SESSION['blad_haslo'] = "Hasla muszą być identyczne";
		}
	}
	$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
	
	if(!isset($_POST['regulamin'])){
		$Poprawny_formularz = false;
		$_SESSION['blad_regulamin'] = "Zaakceptuj regulamin, aby móc się zarejestrować!";
	}
	
	$klucz = "Podaj_secret";
	
	$sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$klucz.'&response='.$_POST['g-recaptcha-response']);
	
	$odpowiedz = json_decode($sprawdz);
	
	if($odpowiedz->success==false){
		$Poprawny_formularz = false;
		$_SESSION['blad_recaptcha'] = "Należy wykonać weryfikację przeciw robotom";
	}
	
	include "polaczenie.php";
	
	$rezultat = $conn->query("SELECT id FROM uzytkownicy WHERE email='$email'");
	$ile_maili = $rezultat->num_rows;
	if($ile_maili>0){
		$Poprawny_formularz = false;
		$_SESSION['blad_email'] = "Konto o podanym adresie email już istnieje!";
	}
		$rezultat = $conn->query("SELECT id FROM uzytkownicy WHERE nick='$nick'");
	$ile_nickow = $rezultat->num_rows;
	if($ile_nickow>0){
		$Poprawny_formularz = false;
		$_SESSION['blad_nick'] = "Konto o podanym nicku już istnieje!";
	}
	
	
	
	if($Poprawny_formularz==true){
		//Formularz dodaje użytkownika do bazy
		
		if($conn->query("INSERT INTO uzytkownicy VALUES (NULL, '$nick', '$haslo_hash', '$email', 1, 1, 1, 'nie wybrano')")){
			$_SESSION['poprawna_rejestracja'] = true;
			header('Location index.php');
		}
		
	}
	$conn->close();
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src='https://www.google.com/recaptcha/api.js'></script>
	
	<style>
		.blad{
			color:red;
			margin-top: 10px;
			margin-bottom: 10px;
		}
	</style>
    <title>Sebastian Matyjaszczyk</title>
</head>
<body>
	<form method='POST'>
		<h2>Uzupelnij informację, aby się zarejestrować</h2>
		Wprowadź nick: <br><br><input type='text' name='nick'>
		<?php
		if(isset($_SESSION['blad_nick'])){
			echo'<div class="blad">'.$_SESSION['blad_nick']'</div>';
			unset($_SESSION['blad_nick']);
		}
		?>
		Wprowadź haslo: <br><br><input type='password' name='haslo1'>
		Wprowadź ponownie haslo: <br><br><input type='password' name='haslo2'>
			<?php
		if(isset($_SESSION['blad_haslo'])){
			echo'<div class="blad">'.$_SESSION['blad_haslo']'</div>';
			unset($_SESSION['blad_haslo']);
		}
		?>
		Wprowadź email: <br><br><input type='text' name='email'>
		<?php
		if(isset($_SESSION['blad_email'])){
			echo'<div class="blad">'.$_SESSION['blad_email']'</div>';
			unset($_SESSION['blad_email']);
		}
		?>
		<label>
		Wyrażam zgodę na akceptację regulaminu: <br><br><input type='checkbox'	name='regulamin'>

		</label>
		<?php
		if(isset($_SESSION['blad_regulamin'])){
			echo'<div class="blad">'.$_SESSION['blad_regulamin']'</div>';
			unset($_SESSION['blad_regulamin']);
		}
		?>
		<br><br>
		<div class="g-recaptcha" data-sitekey="podaj_kod_recaptchy"></div>
		<?php
		if(isset($_SESSION['blad_recaptcha'])){
			echo'<div class="blad">'.$_SESSION['blad_recaptcha']'</div>';
			unset($_SESSION['blad_recaptcha']);
		}
			
		?>
		
	
	
	
		Zarejestruj się:<br><br><input type='submit' value='Zarejestruj się'>
	</form>

</body>
</html>