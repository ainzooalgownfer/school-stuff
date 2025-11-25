<?php
  session_start();
?>
<html>
<head>
	<title>Session : incrémentation</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>


MaVariable vaut <?php $_SESSION["MaVariable"]++;
                      echo $_SESSION["MaVariable"]?>
<br />
<a href="SessionIncrementation.php">Lien pour incrémenter MaVariable</a>

<?php phpinfo(); ?>
</body>
</html>