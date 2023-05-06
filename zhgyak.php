<html>
    <head>
        <title>ZH</title>
       <link rel="stylesheet" type="text/css" href="zhgyak.css">   
    </head>
    <body>

        <h1>FB, JSUMEA</h1>
        <form action="zhgyak.php" method="get">
        Darabszám: <input type="text" name="N">
        <input type="submit" name="ok" value="Lekérdezés">
        </form>

        <table>
            <tr><th>Színész</th><th>Filmek száma</th></tr>


        <?php 
            if(!isset($_GET["N"])){
            echo("Nincs még lekérdezés!");
            }
            $connection = mysqli_connect("localhost", "root", "")
                or die("Kapcsolódási hiba: " . mysqli_error($connection));
            mysqli_select_db($connection, "zh_gyak");
            mysqli_query($connection, "set character_set_results='utf8'");
            
            $szam = $_GET["N"];
            $query = "select szinesz.nev, count(*) from szinesz inner join szereples on szinesz.id = szereples.szinesz_id
                    inner join film on film.id = szereples.film_id 
                    group by szinesz.nev
                    having count(*) >= " .mysqli_real_escape_string($connection, $szam). 
                    " Order by szinesz.nev";     
            $eredmeny = mysqli_query($connection, $query) or die(mysqli_error($connection)); 

        
            for($i = 0; $row = mysqli_fetch_assoc($eredmeny); $i++) {
                echo "<tr><td>".$row["nev"]."</td><td>".$row["count(*)"]."</td></tr>";
                }
                echo "</table>";
                mysqli_free_result($eredmeny);
                mysqli_close($connection); 
        ?>
    </body>
</html