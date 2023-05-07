<html>
<head>
<title>ZH2</title>
<link rel="stylesheet" type="text/css" href="zh2.css">
</head>
<body>
    <h3 id="nev">Név: Fógel Barnabás, Neptun kód: JSUMEA</h3>

    <?php
        if(!isset($_GET["fizetes"])){
            die("Nincs még lekérdezés!");}

        $connection = mysqli_connect("localhost", "root", "")
            or die("Kapcsolódási hiba: " . mysqli_error($connection));
        mysqli_select_db($connection, "zh2");
        mysqli_query($connection, "set character_set_results='utf8'");
        $fizetes = $_GET['fizetes']; 

        if($fizetes >= 100000){

            echo "<table>";
            echo "<tr><th>Árufeltöltő</th><th>Boltok száma</th><th>Terület összege</th></tr>";

            $eredmeny = mysqli_query($connection, "select arufeltolto.nev, count(bolt.id) as 'boltok szama', sum(bolt.terulet) as 'terulet'
            from arufeltolto inner join bolt on arufeltolto.id = bolt.arufeltoltoid
            where arufeltolto.fizetes > ".$fizetes. 
            " group by arufeltolto.id");
            for($i =0; $row = mysqli_fetch_assoc($eredmeny); $i++) {
                echo "<tr><td>".$row["nev"]."</td><td>".$row["boltok szama"]."</td><td>".$row["terulet"]."</td></tr>";
            }
            echo "</table>";
            mysqli_free_result($eredmeny);
            mysqli_close($connection); }

        else{ echo "<h3>A fizetes kisebb, mint 100000!</h3>";}

?>

<p>
           <a href="insert.php">Új elem beszúrása</a>
</p>

</body>
</html>
