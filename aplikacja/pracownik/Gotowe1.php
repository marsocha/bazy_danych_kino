<html>
<head>
<title>Test</title>
</head>
<body bgcolor="white">

<?php
$link = pg_connect("host=lkdb dbname=mrbd user=ms418253 password=kij0Wo64");
 $list= pg_query($link, "select MAX(id) from kasjer");
 $row = pg_fetch_array($list);
 $nowe_id = $row[0];
 $nowe_id += 1;
$dodaj = pg_query($link, "insert into kasjer values ('{$nowe_id}', '{$_POST["login"]}', '{$_POST["haslo"]}')");
 pg_close($link);
?>

 <form action="manage.php" method=POST>
  <input type="submit" value="Wróć do strony pracownika.">
 </form>


</body>
</html>