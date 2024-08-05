<?php

  $dbHost = 'Localhost';
  $dbUsername = 'root';
  $dbPassword = '';
  $dbName = 'formulario-gpicm';

  $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

  // if ($conexao->conect_errno){
  //   echo "Erro na conexão: " . $conexao->connect_error;
  // }else {
  //   echo "Conexao efetuada com sucesso";
  // }

?>