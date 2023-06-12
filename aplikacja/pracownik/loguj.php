<html>
<title>Drzwi wejściowe</title>
<body>
<?php
$kto = $_POST["kto"];
$klucz = $_POST["klucz"];

$link = pg_connect("host=lkdb dbname=mrbd user=ms418253 password=kij0Wo64");
$wynik = pg_query_params($link,
                         "SELECT id
                          FROM kasjer 
                          WHERE login = $1 AND haslo = $2",
                         array($kto,$klucz));
$ile = pg_numrows($wynik);

if ($ile == 0) {
  echo "<center><strong>Niepoprawne hasło lub login użytkownika</strong></center>";
}
else {
  $mana = "manage.php";
  echo "<a href = '$mana'>Zarządzaj kinem</a>";
}
?>
<br>
 <a href="javascript:history.back()">Powrót</a>

</body>
</html> 