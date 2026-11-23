


<?php 
$paczki = $_post['paczki'];
$kremowki = $_post['kremowki'];
                              
?>

<table cellspacing='2'>
 <tr>
    <td>$paczki</td>
    <td>$kremowki</td>
    <td></td>
    <td></td>
 </tr>
</table>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <?php
   $paczki=$_post['paczki'];
   $kremowki=$_POST['kremowki'];
   $suma= ($paczki*0.99) + (9.99*$kremowki);

   
   
   
   
   ?>
   echo<<<end
   <h2>Podsumowanie zamówienia</h2>
 <table border='1' cellpading='10' cellspacing='2'>
   <tr>
      <td>pączek (0.99zł/szt)</td>
      <td>$paczki</td>
   </tr>
   <tr>
      <td>kremówki (9.99zł/szt)</td>
      <td>$kremowki</td>
   </tr>
   <tr>
      <td>Do zapłaty (zł)</td>
      <td>$suma</td>
   </tr>
</table>
end;
</body>
</html>