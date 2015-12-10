<?php

  $cnx = mysql_connect( "localhost","cliardui_npr4","wasaraetu314" ) ;
 
  $db  = mysql_select_db( "cliardui_npr4", $cnx ) ;

  $sql=mysql_query("SELECT count(*) FROM client where id_client=".$_GET[id]);
  while($row=mysql_fetch_assoc($sql)){
  $output[]=$row;
  $out = $output[0];
  }
  $x = json_encode($output);
  print($output[0]['count(*)']);
  mysql_close();
?>