<!DOCTYPE html>
<html>
    <head><title>zh2</title></head>
    <body>
        <form action="insert.php" method="post">
            <h1>Új eladó</h1>
            <p>
                Név: <input type="text" name="nev" />    
            </p>
            <p>
                Fizetés: <input type="number" name="fizetes" />    
            </p>
            <p> 
                <input type="submit" value="Elküld" name="uj" />
            </p>
        </form>
    </body>
</html>

<?php
    include 'db.php';
    if (isset($_POST['uj']) and $_POST['nev'] and isset($_POST['nev'])){
            $connection = getDb();
            $nev = $_POST['nev'];
            $fizetes = $_POST['fizetes'];
        mysqli_query($connection, "insert into elado (nev, fizetes) values('".$nev."' , ".$fizetes.");");
        mysqli_close($connection);
        header("Location: zh2.php");
    }


?>