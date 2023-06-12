<html>
<head>
<title>Test</title>
</head>
<body bgcolor="white">

<?php
if ($_POST["lb"] < 1) {
    echo "Nie można zarezerwować mniej niż 1 bilet";
} else {
    $link = pg_connect("host=lkdb dbname=mrbd user=ms418253 password=kij0Wo64");
    if ($_POST["nr_k"] == -1){
     $numrows = pg_numrows($result);
     $lista_seansow = pg_query($link, "select * from seans");
     $ile_seansow = pg_numrows($lista_seansow);
     $lista_rezer = pg_query($link, "select * from rezerwacja");
     $ile_rezer = pg_numrows($lista_rezer);
     $lista_klient = pg_query($link, "select * from klient");
     $ile_klient = pg_numrows($lista_klient);
     if ($_POST["fname"] != '' and $_POST["lname"] != '' ) {
        $dodaj = pg_query($link, "insert into klient values ('{$ile_klient}', '{$_POST["fname"]}', '{$_POST["lname"]}')");
     }
     echo "<p> Twój numer klienta to: " .$ile_klient. "</p>";
     $nrk = $ile_klient;
    } else {
        $nrk = $_POST["nr_k"];
    }

     $lista_seansow = pg_query($link, "select * from seans");
     $ile_seansow = pg_numrows($lista_seansow);
     $lista_rezer = pg_query($link, "select * from rezerwacja");
     $ile_rezer = pg_numrows($lista_rezer);
     $lista_klient = pg_query($link, "select * from klient");
     $ile_klient = pg_numrows($lista_klient);
     $dodaj = pg_query($link, "insert into rezerwacja values ('{$ile_rezer}', '{$_POST["lb"]}', 'False', '{$_POST["nr_s"]}', $nrk)");
     echo "<p> Twój numer rezerwacji to: " .$ile_rezer. "</p>";
     pg_close($link);
}
?>
<br>
 <a href="javascript:history.back()">Powrót</a>

</body>
</html>