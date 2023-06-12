<html>
<head>
<title>Test</title>
</head>
<body bgcolor="white">

<?php
$tmp =  $_POST["sk"];
$link = pg_connect("host=lkdb dbname=mrbd user=ms418253 password=kij0Wo64");
$dodaj = pg_query($link, "delete from seans where id = '{$tmp}' ");
pg_close($link);
?>
 <form action="manage.php" method=POST>
  <input type="submit" value="Wróć do strony pracownika.">
 </form>


</body>
</html>