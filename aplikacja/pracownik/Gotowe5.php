<html>
<head>
<title>Test</title>
</head>
<body bgcolor="white">

<?php
$link = pg_connect("host=lkdb dbname=mrbd user=ms418253 password=kij0Wo64");
$zmien = pg_query($link, "update rezerwacja set akceptacja = True where id =  '{$_POST["r_id"]}'");
 pg_close($link);
?>


 <form action="manage.php" method=POST>
  <input type="submit" value="Wróć do strony pracownika.">
 </form>


</body>
</html>