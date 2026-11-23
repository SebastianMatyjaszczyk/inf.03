
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <?php
   $paczki=$_POST['paczki'];
   $kremowki=$_POST['kremowki'];
   $suma= (1.99*$paczki) + (9.99*$kremowki);
 if($suma>100){
    0.9*$suma;
    echo'naliczono rabat 10%';
 }else{
   $suma;
 }
   
   
   
   
   
echo<<<END
   <h2>Podsumowanie zamówienia</h2>
 <table border='1' cellpading='10' cellspacing='2'>
   <tr>
      <td>pączek (1.99zł/szt)</td>
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
END;
?>
</body>
</html>