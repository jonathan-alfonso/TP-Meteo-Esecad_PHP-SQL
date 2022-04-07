<?php
    require('script.php');
    
    $select_query = "SELECT date, ville, periode, resume, id_resume, temp_min, temp_max, commentaire FROM meteo WHERE date > '2013-12-05' ORDER BY date";

    $result = $mysqli->query($select_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Projet Météo - Test</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Ville</th>
                <th>Période</th>
                <th>Résumé</th>
                <th>ID résumé</th>
                <th>Température minimale</th>
                <th>Température maximale</th>
                <th>Comentaire</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($result)): ?>
                <tr>
                    <td><?php echo $row['date'] ?></td>
                    <td><?php echo $row['ville'] ?></td>
                    <td><?php echo $row['periode'] ?></td>
                    <td><?php echo $row['resume'] ?></td>
                    <td><?php echo $row['id_resume'] ?></td>
                    <td><?php echo $row['temp_min'] ?></td>
                    <td><?php echo $row['temp_max'] ?></td>
                    <td><?php echo $row['commentaire'] ?></td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</body>
</html>