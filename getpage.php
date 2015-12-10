 <?php

   $cnx = mysql_connect( "localhost","cliardui_npr4","wasaraetu314" )   or die('Erreur de connexion '.mysql_error());

    mysql_select_db('cliardui_npr4',$cnx)  or die('Erreur de selection '.mysql_error());
    
    $sql=mysql_query("SELECT count(*) FROM donnees where id_client=".$_GET[id]);
    while($row=mysql_fetch_assoc($sql)){
    $output[]=$row;
    $out = $output[0];
    }
    $x=$output[0]['count(*)'] + 1;
    
    $date = date('d/m/Y H:i:s', time());
    
    // on écrit la requête sql
    $datesec = strtotime($date);
    $sql = "INSERT INTO donnees(it, id_client, temp, hum, date_et_heure, date_et_heure_sec) VALUES ('$x', '$_GET[id]', '$_GET[temp]', '$_GET[hum]', '$date', '$datesec')";
    
    // on insère les informations du formulaire dans la table
    mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

    // on affiche le résultat pour le visiteur
    echo 'Vos infos on été ajoutées.';

    mysql_close();  // on ferme la connexion
    
?> 