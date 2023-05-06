


<html>
<head>
<title>ZH megoldás</title>
<link rel="stylesheet" type="text/css" href="zhgyak1.css">
</head>
<body>
    <h1>Név: Fógel Barnabás, Neptun kód: JSUMEA</h1>

    
    <table>
    <tr><th>Név</th><th>Mellék</th></tr>

<?php
    if(!isset($_GET["szobaszam"])){
        die("Nincs még lekérdezés!");
    }

    $connection = mysqli_connect("localhost", "root", "")
                or die("Kapcsolódási hiba: " . mysqli_error($connection));
            mysqli_select_db($connection, "zh_gyak1");
            mysqli_query($connection, "set character_set_results='utf8'");
            $szobaszam = $_GET['szobaszam'];
            $eredmeny = mysqli_query($connection, "select kollega.nev, mellek.szam from kollega inner join szoba on szoba.id = kollega.szoba_id
            inner join mellek on mellek.id = kollega.mellek_id where szoba.szobaszam = '".$szobaszam.
            "' order by kollega.nev;");

            for($i =0; $row = mysqli_fetch_assoc($eredmeny); $i++) {
                echo "<tr><td>".$row["nev"]."</td><td>".$row["szam"]."</td></tr>";
                }
                echo "</table>";
                mysqli_free_result($eredmeny);
                mysqli_close($connection); 

?>



</body>
</html>