<?php
  session_start();
  $_SESSION["MaVariable"]=1;
?>
<html>
<head>
	<title>Session : initialisation</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<br /><br />
MaVariable vaut <?php echo $_SESSION["MaVariable"]; ?><br />
<a href="SessionIncrementation.php">Lien pour incrémenter MaVariable</a>
</body>
</html>