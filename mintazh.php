<html>
<head>
<title>mintazh</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h3 id="nev">Név: Fógel Barnabás, Neptun kód: JSUMEA</h3>

    <?php
        if(!isset($_GET["fajnev"])){
            die("<h3 id='hiba'>Nincs még lekérdezés!</h3>");}

        $connection = mysqli_connect("localhost", "root", "")
            or die("Kapcsolódási hiba: " . mysqli_error($connection));
        mysqli_select_db($connection, "mintazh");
        mysqli_query($connection, "set character_set_results='utf8'");
        $fajnev = $_GET['fajnev']; 

        echo "<table>";
        echo "<tr><th>Azonosító</th><th>Név</th><th>Legfiatalabb</th></tr>";

        $eredmeny = mysqli_query($connection, "select allat.id as 'id', allat.nev as 'nev', min(gondozo.kor) as 'legfiatalabb'
        from allat inner join kapcsolat on allat.id = kapcsolat.allatid
        inner join gondozo on gondozo.id = kapcsolat.gondozoid
        where allat.faj = '".$fajnev."'
        group by allat.id
        order by allat.nev;");
        for($i =0; $row = mysqli_fetch_assoc($eredmeny); $i++) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["nev"]."</td><td>".$row["legfiatalabb"]."</td></tr>";
        }
        echo "</table>";
        mysqli_free_result($eredmeny);
        mysqli_close($connection); 

        

    ?>

</body>
</html>