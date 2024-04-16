<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<header>
    
</header>
<body>
    <center>
        <h1>Restaurante - Mapa de mesas</h1>
        <div class="colorInfo">
            <section><b><p style="color:green;">Verde:</p></b><p>Disponible</p></section>
            <section><b><p style="color:red;">Rojo:</p></b><p>Reservado</p></section>
        </div>
        <?php
            $file = fopen("mesas.csv", "r");
            while(!feof($file)){
                $data[] = explode("|", fgets($file));
            }
            fclose($file);

            $hourCount = 10;
            $tableId = 1;
            $date = 1;
            $month = 4;
            echo "<table style='min-height:60vh; width:60vw;'><tr>";
            echo "<th>Fila 1</th><th>Fila 2</th><th>Fila 3</th><th>Fila 4</th><th>Fila 5</th><th>Fila 6</th><th>Fila 7</th>";
            echo "</tr>";
            for($i = 0; $i < count($data); $i++){
                for($j = 0; $j < 7; $j++){
                    if($data[$i][$j] == "disponible"){
                        echo "<td><div class='mesa' style='background-color:green;'><a class='reserveButton' href='pedir.php?num=".$tableId."'>Reservar</a></div></td>";
                    }
                    if($data[$i][$j] == "nodisponible"){
                        echo "<td><div class='mesa' style='background-color:red'></div></td>";
                    }
                    $tableId++;
                }
                echo "</tr>";
            }
        ?>
    </center>
</body>
</html>