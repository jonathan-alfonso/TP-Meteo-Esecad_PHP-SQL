<?php

    // Connexion à MySQL et vérification
    $mysqli = new mysqli('localhost', 'root', '', 'projet_meteo');
    if ($mysqli->connect_errno)
    {
        echo 'Échec de la connexion à MySQL : '. $mysqli->connect_error;
        exit();
    }

    // Lecture du CSV et insertion dans la base de données
    if (($handle = fopen('meteo.csv', 'r')) !== FALSE)
    {
        while (($data = fgetcsv($handle, 1000, ';')) !== FALSE)
        {
            // var_dump($data);

            $date = $data[0];
            $ville = $data[1];
            $periode = $data[2];
            $resume = $data[3];
            $id_resume = $data[4];
            $temp_min = $data[5];
            $temp_max = $data[6];
            $commentaire = $data[7];

            $query_result = $mysqli->query('SELECT id FROM meteo');
            $row_cnt = mysqli_num_rows($query_result);

            if ($row_cnt < 9)
            {
                $insert_query = 'INSERT INTO meteo (date, ville, periode, resume, id_resume, temp_min, temp_max, commentaire) VALUES ("'. $date .'", "'. $ville .'", "'. $periode .'", "'. $resume .'", "'. $id_resume .'", "'. $temp_min .'", "'. $temp_max .'", "'. $commentaire .'")';
                $mysqli->query($insert_query);
            }
        }
    }
?>