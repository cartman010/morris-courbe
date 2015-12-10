<?php

  $cnx = mysql_connect( "localhost","cliardui_npr4","wasaraetu314" ) ;
 
  $db  = mysql_select_db( "cliardui_npr4", $cnx ) ;

  $date = date('d/m/Y H:i:s', time());

  $sql=mysql_query("SELECT * FROM donnees where it=".$_GET[it]." and id_client=".$_GET[id]);
  while($row=mysql_fetch_assoc($sql)){
  $output[]=$row;
  $out = $output[0];
  }
  $x = json_encode($output);
  print($output[0]['date_et_heure']."|". $output[0]['date_et_heure_sec']."|". $output[0]['temp']."*". $output[0]['hum']);
  mysql_close();
?>