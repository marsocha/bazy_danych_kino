<html>
<head>
<title>Test</title>
</head>
<body bgcolor="white">
<h1> Wybierz repertuar w danym dniu lub filmu. </h1>

</table>
 <form action="reper.php" method=POST>
  <SELECT NAME="dzien">
  <OPTION SELECTED>Cały tydzień
  <OPTION>pn
  <OPTION>wt
  <OPTION>sr
  <OPTION>cz
  <OPTION>pt
  <OPTION>sb
  <OPTION>nd
  </SELECT>
    <?php
    echo '<select name="tyt">';
    $link = pg_connect("host=lkdb dbname=mrbd user=ms418253 password=kij0Wo64");
    $result = pg_query($link, "select tytul from film");
    $numrows = pg_numrows($result);
    echo '<option>dowolnie</option>';    
    for($ri = 0; $ri < $numrows; $ri++) {
    $row = pg_fetch_array($result);
    $name = $row['tytul'];
    echo '<option value="' .$name. '">' .$name. '</option>';
    }
    echo '</select>';
    pg_close($link);
    ?>
    <input type="submit" value="SZUKAJ">
 </form> 

<h2> Sprawdź stan swoich rezeracji. Podaj swój numer klienta. </h2>
 <form action="stan_rezer.php" method=POST>
    <?php
    echo '<select name="rez">';
    $link = pg_connect("host=lkdb dbname=mrbd user=ms418253 password=kij0Wo64");
    $result = pg_query($link, "select klient_id from rezerwacja");
    $numrows = pg_numrows($result);    
    for($ri = 0; $ri < $numrows; $ri++) {
    $row = pg_fetch_array($result);
    $name = $row['klient_id'];
    echo '<option value="' .$name. '">' .$name. '</option>';
    }
    echo '</select>';
    pg_close($link);
    ?>
    <input type="submit" value="SZUKAJ">
 </form> 


<br>
 <a href="javascript:history.back()">Powrót</a>
</body>
</html>