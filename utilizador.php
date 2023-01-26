<html>



<form name="inserir_utilizador" action="inserir_registo.php" method="POST">

  Utilizador: <input type="text" name="username"><br>
  Palavra-passe: <input type="password" name="password"><br>
  
  <input type="submit" value="inserir">

</form>

<?php
include "ligacao.php";
?>
</html>