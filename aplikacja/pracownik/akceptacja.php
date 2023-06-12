<html>
<head>
<title>Test</title>
</head>
<body bgcolor="white">

 <form action="Gotowe5.php" method=POST>
  <?php
    echo"<p> Rezerwacje, które można zaakceptować ze względu na liczbę miejsc (seans_id, liczba_miejsc, ile jeszcze zostało wolnych) </p>";
    echo '<select name="r_id">';
    $link = pg_connect("host=lkdb dbname=mrbd user=ms418253 password=kij0Wo64");
    $result = pg_query($link, "select id, ile_miejsc, seans_id from rezerwacja where akceptacja = False");
    $numrows = pg_numrows($result);  
    for($ri = 0; $ri < $numrows; $ri++) {
      $row = pg_fetch_array($result);
      $name = $row['seans_id'];
      $tyt = $row['ile_miejsc'];
      $dana = $row["id"];

      $pom1 = pg_query($link, "select liczba_miejsc from sala_kinowa z1 join seans z2 on z1.numer=z2.sala_id where id = '{$name}'");
      $pom2 = pg_fetch_array($pom1);

      $ile_juz_zar = pg_query($link, "select sum(ile_miejsc) from rezerwacja where seans_id = '{$name}' and akceptacja = True");
      $ro = pg_fetch_array($ile_juz_zar);
      $t = $pom2[0] - $ro[0] - $row['ile_miejsc'];
      $t2 = $pom2[0] - $ro[0];
      if( $t >= 0) {
        echo '<option value="' .$dana. '"> seans_id: ' .$name. ',id rezerwacji: ' .$row["id"].  ', ile chce miejsc: ' .$tyt. ', ile zostało wolnych : ' .$t2.  '</option>';
      }
    }
    echo '</select>';
    pg_close($link);
    ?>
  <input type="submit" value="Zaakceptuj">
 </form>



  <br><br>
 <br>
 <a href="javascript:history.back()">Powrót</a>
</body>
</html>




