<html>
<head>
<title>Test</title>
</head>
<body bgcolor="white">

<?php
$link = pg_connect("host=lkdb dbname=mrbd user=ms418253 password=kij0Wo64");
$str = $_POST["dzien"];
$stri = $_POST["tyt"];
$result1 = pg_query($link, "select z1.id, tytul, dzien_tygodnia, godzina_rozpoczecia, akceptacja from rezerwacja z1 join seans z2 on z1.seans_id=z2.id join film z3 on z2.film_id=z3.id where akceptacja ");
$result2 = pg_query($link, "select z1.id, tytul, dzien_tygodnia, godzina_rozpoczecia, akceptacja from rezerwacja z1 join seans z2 on z1.seans_id=z2.id join film z3 on z2.film_id=z3.id where not akceptacja ");
$numrows1 = pg_numrows($result1);
$numrows2 = pg_numrows($result2);
?>

<p align=center>Zaakceptowane rezerwacje</p>

<table border="10" align=center>
<tr>
<th>Tytuł</th><th>Dzień tygodnia</th><th>Godzina rozpoczęcia</th>
</tr>
<?php

 // Przechodzimy po wierszach wyniku.

 for($ri = 0; $ri < $numrows1; $ri++) {
  echo "<tr>\n";
  $row = pg_fetch_array($result1, $ri);
  echo "<td>" .$row["tytul"]. " </td> <td> " .$row["dzien_tygodnia"]. " </td> <td> " .$row["godzina_rozpoczecia"]. " </td> ";

 }
 pg_close($link);
?>
</table>
<p align=center>Niezaakceptowane rezerwacje</p>

<table border="10" align=center>
<tr>
<th>Tytuł</th><th>Dzień tygodnia</th><th>Godzina rozpoczęcia</th>
</tr>
<?php

 // Przechodzimy po wierszach wyniku.

 for($ri = 0; $ri < $numrows2; $ri++) {
  echo "<tr>\n";
  $row = pg_fetch_array($result2, $ri);
  echo "<td>" .$row["tytul"]. " </td> <td> " .$row["dzien_tygodnia"]. " </td> <td> " .$row["godzina_rozpoczecia"]. " </td> ";

 }
 pg_close($link);
?>
</table>

 <br>
 <a href="javascript:history.back()">Powrót</a>



</body>
</html>



