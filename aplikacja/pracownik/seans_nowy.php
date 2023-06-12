<html>
<head>
<title>Test</title>
</head>
<body bgcolor="white">
 <form action="Gotowe3.php" method=POST>
  <label for="g">Godzina rozpoczęcia:</label> <br><br>
  <input type="time" id="g" name="g">
  <p> Dzień tygodnia </p>
  <SELECT NAME="dzien">
  <OPTION>pn
  <OPTION>wt
  <OPTION>sr
  <OPTION>cz
  <OPTION>pt
  <OPTION>sb
  <OPTION>nd
  </SELECT>
  <?php
    echo"<p> Film (film_id) </p>";
    echo '<select name="f">';
    $link = pg_connect("host=lkdb dbname=mrbd user=ms418253 password=kij0Wo64");
    $result = pg_query($link, "select tytul, id from film");
    $numrows = pg_numrows($result);  
    for($ri = 0; $ri < $numrows; $ri++) {
    $row = pg_fetch_array($result);
    $name = $row['id'];
    $tyt = $row['tytul'];
    echo '<option value="' .$name. '">' .$tyt. ' (' .$name. ') </option>';
    }
    echo '</select>';
    pg_close($link);
  ?>
  <?php
    echo"<p> Numer sali </p>";
    echo '<select name="sk">';
    $link = pg_connect("host=lkdb dbname=mrbd user=ms418253 password=kij0Wo64");
    $result = pg_query($link, "select numer from sala_kinowa");
    $numrows = pg_numrows($result);  
    for($ri = 0; $ri < $numrows; $ri++) {
    $row = pg_fetch_array($result);
    $name = $row['numer'];
    echo '<option value="' .$name. '">' .$name. '</option>';
    }
    echo '</select>';
    pg_close($link);
  ?>
  <br><br>
  <input type="submit" value="Dodaj">
 </form>
 <br>
 <a href="javascript:history.back()">Powrót</a>
</body>
</html>
