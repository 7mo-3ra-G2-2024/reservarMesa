<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        form{
            margin-top: 15vh;
            width: 20vw;
            height: 40vh;
            padding: 5vw;
            border: 1px;
            border-radius: 3vw;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            background-color: cadetblue;
        }
        input, textarea, select{
            background-color: antiquewhite;
            width: 15vw;
            height: 3vw;
            margin-bottom: 2vh;
        }
        input[type="submit"]:hover{
            cursor: grab;
            transform: scale(1.1);
            transition: 300ms;            
        }
    </style>
</head>
<header>
    
</header>
<body>
    <center>
        <form action="pedir.php?">
            <?php
                if(!isset($_GET["num"])){
                    header("Location: index.php");
                    die();
                }
                echo "<h2>Mesa n°".$_GET["num"]."</h2>";
            ?>
            <input type="hidden" name="num" value="<?php echo $_GET["num"] ?>">
            <input type="text" name="dni" placeholder="DNI" required>
            <input type="text" name="apellido" placeholder="Apellido" required>
            <input type="text" name="nombre" placeholder="Nombre" required>
            <select name="metodo">
                <option name="efectivo">Efectivo</option>
                <option name="tarjeta">Tarjeta</option>
            </select>
            <input type="submit" name="submitted" value="Reservar mesa">
        </form>
    </center>
    <?php
        if(isset($_GET["submitted"])){
            $file = fopen("pendientes.csv", "a");
            fwrite($file, "\n".$_GET["dni"]."|".$_GET["apellido"]."|".$_GET["nombre"]."|".$_GET["metodo"]);
            fclose($file);
            header("Location: index.php");
        }
    ?>
</body>
</html>