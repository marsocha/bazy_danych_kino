<html>
<head>
<title>Test</title>
</head>
<body bgcolor="white">

<?php
$link = pg_connect("host=lkdb dbname=mrbd user=ms418253 password=kij0Wo64");
$str = $_POST["dzien"];
$stri = $_POST["tyt"];
if ($str == 'Cały tydzień' and $stri == 'dowolnie'){
    $result = pg_query($link, "select z1.tytul, z2.dzien_tygodnia, z2.godzina_rozpoczecia, z2.id
 from film z1 join seans z2 on z1.id = z2.film_id");
} elseif ($str2 == 'dowolnie') {
$result = pg_query($link, "select z1.tytul, z2.dzien_tygodnia, z2.godzina_rozpoczecia, z2.id
 from film z1 join seans z2 on z1.id = z2.film_id where z2.dzien_tygodnia = '{$str}'");
} elseif($str == 'Cały tydzień') {
    $result = pg_query($link, "select z1.tytul, z2.dzien_tygodnia, z2.godzina_rozpoczecia, z2.id
 from film z1 join seans z2 on z1.id = z2.film_id where z1.tytul = '{$stri}'");
} else {
     $result = pg_query($link, "select z1.tytul, z2.dzien_tygodnia, z2.godzina_rozpoczecia, z2.id
 from film z1 join seans z2 on z1.id = z2.film_id where z1.tytul = '{$stri}' and z2.dzien_tygodnia = '{$str}'");
}
$numrows = pg_numrows($result);
?>

<h2 align=center>Repertuar</h2>

<table border="10" align=center>
<tr>
 <th>Tytuł</th><th>Dzień tygodnia</th><th>Godzina rozpoczęcia</th><th>Numer seansu</th>
</tr>
<?php

 // Przechodzimy po wierszach wyniku.

 for($ri = 0; $ri < $numrows; $ri++) {
  echo "<tr>\n";
  $row = pg_fetch_array($result, $ri);
  echo "<td>" .$row["tytul"]. " </td> <td> " .$row["dzien_tygodnia"]. " </td> <td> " .$row["godzina_rozpoczecia"]. " </td> <td> " .$row["id"]. " </td>
 </tr>
";

 }

 $lista_seansow = pg_query($link, "select * from seans");
 $ile_seansow = pg_numrows($lista_seansow);
 $lista_rezer = pg_query($link, "select * from rezerwacja");
 $ile_rezer = pg_numrows($lista_rezer);
 $lista_klient = pg_query($link, "select * from klient");
 $ile_kleint = pg_numrows($lista_klient);
 pg_close($link);
?>
 <p> Jeśli jesteś nowym klintem i chcesz zarezerwować bilety na seans utwórz konto podając imię i nazwisko, a w numerze klienta wpisz "-1". <br>
  Jeśli jesteś już klientem podaj swój numer klienta. Podaj również numer seansu. </p>
 <form action="rezer.php" method=POST>
  <label for="nr_k">Numer klienta:</label>
  <input type="text" id="nr_k" name="nr_k">
  <label for="nr_s">Numer seansu:</label>
  <input type="text" id="nr_s" name="nr_s"><br><br>
  <label for="fname">Imię:</label>
  <input type="text" id="fname" name="fname">
  <label for="lname">Nazwisko:</label>
  <input type="text" id="lname" name="lname"><br><br>
  <label for="lname">Liczba biletów:</label>
  <input type="text" id="lb" name="lb"><br><br>
  <input type="submit" value="Rezerwuj">
 </form>
 <br>
 <a href="javascript:history.back()">Powrót</a>



</body>
</html>