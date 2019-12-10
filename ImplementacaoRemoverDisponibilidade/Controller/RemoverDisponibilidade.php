
<?php
require_once dirname(__FILE__) . '/../Model/Disponibilidade.php';
Disponibilidade::remover($_GET['dispExcluir']);
header ('location: ../telaUsuario.php');
?>


