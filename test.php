<!doctype html>
<head>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
  <script src="morris.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
  <script src="lib/example.js"></script>
  <link rel="stylesheet" href="lib/example.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
  <link rel="stylesheet" href="morris.css">
</head>
<body>

<h1>Updating data</h1>
<div id="graph"></div>
<div id="reloadStatus">
<pre id="code" class="prettyprint linenums">

  var res = 0;
  
<?php

  $cnx = mysql_connect( "localhost","cliardui_npr4","wasaraetu314" ) ;
 
  $db  = mysql_select_db( "cliardui_npr4", $cnx ) ;

  $sql=mysql_query("SELECT count(*) FROM donnees");
  while($row=mysql_fetch_assoc($sql)){
  $output[]=$row;
  $out = $output[0];
  }
  $x = json_encode($output);
  mysql_close();
?>

var getcount = <?php print($output[0]['count(*)']); ?>;
res = getcount;
var xhttp;
  
function checkdata(){

  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
            
            document.getElementById("reloadStatus").innerHTML = getcount + "*" + res;
            if(parseInt(getcount) < parseInt(res))
              document.getElementById("graph").innerHTML = parseInt(getcount) - parseInt(res);
 
            res = xhttp.responseText;
  
    }
    };
  xhttp.open("GET", "count.php", false);
  xhttp.send();
  
}

setInterval(checkdata, 2000);
  
  
</pre>
</body>
