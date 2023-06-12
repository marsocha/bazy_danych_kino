<html>
<head>
<title>Test</title>
</head>
<body bgcolor="white">

<?php
$link = pg_connect("host=lkdb dbname=mrbd user=ms418253 password=kij0Wo64");
$numrows = pg_numrows($result);
 $lista_seansow = pg_query($link, "select * from seans");
 $ile_seansow = pg_numrows($lista_seansow);
 $lista_rezer = pg_query($link, "select * from rezerwacja");
 $ile_rezer = pg_numrows($lista_rezer);
 $lista_klient = pg_query($link, "select * from klient");
 $ile_klient = pg_numrows($lista_klient);
 if ($_POST["fname"] != '' or $_POST["lname"] != '' ) {
    $dodaj = pg_query($link, "insert into klient values ('{$ile_klient}', '{$_POST["fname"]}', '{$_POST["lname"]}')");
 }
 echo "<p> Twój numer klienta to: " .$ile_klient. "</p>";
 pg_close($link);
?>

 <form action="reper.php" method=POST>
  <input type="submit" value="Wróć do repertuaru">
 </form>


</body>
</html>