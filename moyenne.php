<?php

    /* Connexion à la base de données */
    $serveur  = 'localhost';
    $port_pdo = '3306';
    $bdd      = 'gestion_etudiants';
    $user     = 'root';
    $password = '';
    $connexion = new PDO('mysql:host='.$serveur.';port='.$port_pdo.';dbname='.$bdd, $user, $password);

    /* Récupération des notes et calcul des moyennes */
    $res_moy=$connexion->query('SELECT etud.etud_prenom AS pren, etud.etud_nom AS nom, m.matiere_nom AS matiere, 
               sum(n.note_note*n.note_coef)/sum(n.note_coef) AS moyenne
                    FROM etudiant AS etud
                    RIGHT JOIN note AS n ON etud.etud_id = n.note_idetudiant 
                    LEFT JOIN matiere AS m ON m.matiere_id = n.note_idmatiere
                    GROUP BY n.note_idetudiant, n.note_idmatiere ORDER BY etud.etud_nom, m.matiere_nom;');
    echo 'LISTE DES MOYENNES DES ETUDIANTS :'."<br />";
    $res_moy->setFetchMode(PDO::FETCH_OBJ);
            while ($data = $res_moy->fetch()) {
                echo $data->pren.' '.$data->nom.' '.sprintf("%-10s\n",   $data->matiere).' '.sprintf("%01.2f", $data->moyenne).' ';
                echo "<br />";
            }
  /*  $listNotes = mysqli_query($link,$sql_etud);
    
    while ($data = mysqli_fetch_array($listNotes,MYSQLI_ASSOC)) {
        echo $data['pren']." ". $data['nom']." ".$data['matiere']. " ". $data['moyenne'];
        echo "<br />";
    }*/
    ?>
    <br />
    <a href="formulaire.php">Saisir des notes</a>