<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        $servername = "localhost";
        $username = "user_dwes";
        $password = "userUSER2";
        $dbname = "dwes";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", "$username", "$password");
    ?>

    <form action="">
        <label for="familias">Seleccione una familia:</label>
        <select name="familias" id="">
        <?php
                $sqlQueryFamilias = "SELECT * FROM FAMILIA;";
                $result =  $conn->query($sqlQueryFamilias);
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                    $cod = $row['COD'];
                    $nombre = $row['NOMBRE'];
                    ?>
                    <option value="<?php echo $cod ?>"><?php echo $nombre ?></option>
                    <?php
                }
            ?>
        </select>
        
    </form>
</body>

</html>