<?php
require_once("conecta.php");			
function buscaUsuario($conexao, $user, $senha) {
	$senhaMd5 = md5($senha);
	$user = mysqli_real_escape_string($conexao, $user);
	$query = "SELECT * FROM usuarios WHERE (email = '$user' OR user = '$user') and senha='{$senhaMd5}'";
	$resultado = mysqli_query($conexao, $query);
	$usuario = mysqli_fetch_assoc($resultado);
	return $usuario;
}