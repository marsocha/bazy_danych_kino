<html>
<body>

Tydzień tygodnia: <?php echo  $_POST["kiedy"]; ?>
<?php
$link = pg_connect("host=lkdb dbname=bd user=ms418253 password=kij0Wo64");
$result = pg_query($link, "select * from SEANS where dzien_tygonia = 'pn'");
?>
<?php

	echo  $result;
	pg_close($link);
?>
</body>
</html> 