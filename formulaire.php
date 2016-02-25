<html>
    <head>
        <title>Formulaire Notes des étudiants</title>
        <meta charset="UTF-8">
    </head>
    <body>
<?php
    error_reporting(E_ALL & ~E_NOTICE);

    $serveur  = 'localhost';
    $port_pdo = '3306';
    $bdd      = 'gestion_etudiants';
    $user     = 'root';
    $password = '';
    $connexion = new PDO('mysql:host='.$serveur.';port='.$port_pdo.';dbname='.$bdd, $user, $password);
    echo "Gestionnaire de notes des étudiants";
    ?>
    <form action="" method="post">
        <p>Etudiant : <select name="etudiant">
        <?php
            /* Récupération des étudiants */
            $res_etud=$connexion->query("SELECT etud_id,etud_prenom,etud_nom FROM etudiant");
            $res_etud->setFetchMode(PDO::FETCH_OBJ);
            while ($data = $res_etud->fetch()) {
                echo'<option value="'.$data->etud_id.'">'.$data->etud_prenom." ".$data->etud_nom.'</option>';
            }
        ?>
        </select>
        <p>Matière : <select name="matiere">
    <?php
        /* Récupération des matières */
        $res_mat=$connexion->query("SELECT matiere_id,matiere_nom FROM matiere");
        $res_mat->setFetchMode(PDO::FETCH_OBJ);
        while ($data = $res_mat->fetch()) {
            echo'<option value="'.$data->matiere_id.'">'.$data->matiere_nom.'</option>';}
        ?>
        </select></p>
        <p>Note : <input type="number" required name="note" min="0" max="20" step="0.1" placeholder="Saisir une note" /></p>
        <p>Coef : <input type="number" required name="coef" min="0.1" max="20" step="0.1" placeholder="Saisir un coef" /></p>
        <p><input type="submit" value="Enregistrer"></p>


      <p>
            <?php
            $insert_ok = true;
            if (!isset($_POST['etudiant'])) {
                $insert_ok = false;
            }
            if (!isset($_POST['matiere'])) {
                $insert_ok = false;               
            }
            if (!isset($_POST['note'])) {
                $insert_ok = false;
            }
            if (!isset($_POST['coef'])) {
                $insert_ok = false;      
            }

            if ($insert_ok) {
                $etudiant = $_POST['etudiant'];
                $matiere  = $_POST['matiere'];
                $note     = $_POST['note'];
                $coef     = $_POST['coef'];                
                /* Insertion de la note de l'étudiant dans la base de données */
                $sql_insert = $connexion->exec("INSERT INTO note (note_idetudiant, note_idmatiere, note_note, note_coef) VALUES ('".$etudiant."', '".$matiere."', '".$note."', '".$coef."')");
                if (!$sql_insert) {
                   die('Requête invalide : ' . mysql_error());
                }
            }
        ?>
    <p>  

    </form>

        <a href="moyenne.php">Consulter les moyennes</p>
    </p
    </body>
</html>