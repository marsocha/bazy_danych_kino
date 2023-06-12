<html>
<head>
<title>Test</title>
</head>
<body bgcolor="white">
 <form action="Gotowe4.php" method=POST>
  <?php
    echo"<p> Wybierz seans do usunięcia (id seansu, dzień tygodnia, godzina, numer sali) </p>";
    echo '<select name="sk">';
    $link = pg_connect("host=lkdb dbname=mrbd user=ms418253 password=kij0Wo64");
    $result = pg_query($link, "select * from seans");
    $numrows = pg_numrows($result);  
    for($ri = 0; $ri < $numrows; $ri++) {
    $row = pg_fetch_array($result);
    $name = $row['id'];
    echo '<option value="' .$name. '">' .$name. ', ' .$row['dzien_tygodnia']. ', ' .$row['godzina_rozpoczecia'].', ' .$row['sala_id']. '</option>';
    }
    echo '</select>';
    pg_close($link);
  ?>
  <br><br>
  <input type="submit" value="Usuń">
 </form>
 <br>
 <a href="javascript:history.back()">Powrót</a>
</body>
</html>
