<?php
include("cabecalho.php");
date_default_timezone_set("Brazil/East");
    $date = date('d/m/Y', time());
?>
    <h1 align='center' class='alert-success'>Olá, Mundo!</h1><br>
    <h1 id="horas" align='center'></h1>
    <h1 align='center'><?=$date?></h1>
<?php

include("rodape.php");
?>