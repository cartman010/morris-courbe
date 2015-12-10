<?php

  $cnx = mysql_connect( "localhost","cliardui_npr4","wasaraetu314" ) ;
 
  $db  = mysql_select_db( "cliardui_npr4", $cnx ) ;

  $date = date('d/m/Y H:i:s', time());

  $sql=mysql_query("SELECT it FROM donnees where date_et_heure_sec >=".(strtotime($date) - 15));
  while($row=mysql_fetch_assoc($sql)){
  $output[]=$row;
  $out = $output[0];
  }
  $x = json_encode($output);
  print($output[0]['it']);
  mysql_close();
?>