<!-- Com os conhecimentos de HTML e Bootstrap, criar uma página HTML com um formulário para 
inserção de dados de uma pessoa, com os seguintes campos: -->
<?php

  if (isseT($_POST['enviar'])){
    // print_r ($_POST['nome']);
    // print_r('<br>');
    // print_r ($_POST['sobrenome']);
    // print_r('<br>');
    // print_r ($_POST['pessoa']);
    // print_r('<br>');
    // print_r ($_POST['cpf_cnpj']);
    // print_r('<br>');
    // print_r ($_POST['nasc']);
    // print_r('<br>');
    // print_r ($_POST['endereco']);
    // print_r('<br>');
    // print_r ($_POST['bairro']);
    // print_r('<br>');
    // print_r ($_POST['cep']);
    // print_r('<br>');
    // print_r ($_POST['estado']);
    // print_r('<br>');
    // print_r ($_POST['cidade']);
    // print_r('<br>');
    // print_r ($_POST['tel']);
    // print_r('<br>');
    // print_r ($_POST['cel']);
    // print_r('<br>');
    // print_r ($_POST['inscricao']);
    // print_r('<br>');
    // print_r ($_POST['observacao']);

    include_once('config.php');

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $pessoa = $_POST['pessoa'];
    $cpf_cnpj = $_POST['cpf_cnpj'];
    $nasc = $_POST['nasc'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $tel = $_POST['tel'];
    $cel = $_POST['cel'];
    $inscricao = $_POST['inscricao'];
    $observacao = $_POST['observacao'];

    // Preparar a consulta SQL com placeholders
    $stmt = $conexao->prepare("INSERT INTO pessoas (nome, sobrenome, tipo_pessoa, cpf_cnpj, data_nascimento, endereco, bairro, cep, estado, cidade, telefone, celular, inscricao_estadual, observacoes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind dos parâmetros
    $stmt->bind_param("ssssssssssssss", $nome, $sobrenome, $pessoa, $cpf_cnpj, $nasc, $endereco, $bairro, $cep, $estado, $cidade, $tel, $cel, $inscricao, $observacao);

    // Executar a consulta
    if ($stmt->execute()) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . $stmt->error;
    }

    // Fechar a declaração
    $stmt->close();
  }
?>


<!DOCTYPE html>

<html lang="pt-BR" data-bs-theme="dark">

    <!-- cabeçalho -->
    <head>

      <meta charset="utf-8">
      
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

      <link href="style.css" rel="stylesheet">

      <title> 
        Formulário
      </title>

    </head>

    <!-- corpo da pagina -->
    <body class="d-flex align-items-center py-3 bg-body-tertiary">

      <main class="w-100 m-auto form-container">

        <form action="formulario.php" method = "POST">  <!-- formulario -->

          <h1 class="h3 mb-3 fw-normal">
            Cadastro:
          </h1>

          <div class="row pb-2">
              <label for="primeiroNome">Nome</label>
              <input type="text" name ="nome" class="form-control" id="primeiroNome" placeholder="" value="" required>
          </div>

          <div class="row pb-2">
              <label for="sobrenome">Sobrenome: </label>
              <input type="text" name="sobrenome" class="form-control" id="sobrenome" placeholder="" value="" required>
          </div>

          <div class="row pb-2">
              <label for="pessoa">Tipo de Pessoa: </label>
              <select class="custom-select d-block w-100" name="pessoa" id="pessoa" required>  <!-- lista pre definida de opcoes -->
                <option value="" disabled selected>
                  Selecione 
                </option>
      
                <option value="CPF"> 
                  Pessoa Física
                </option>
      
                <option value="CNPJ"> 
                  Pessoa Jurídica
                </option>
              </select>
          </div>

          <div class="row pb-2">
              <label for="cpf_cnpj">CPF/CNPJ: </label>
              <input type="text" name= "cpf_cnpj" class="form-control" id="cpf_cnpj" placeholder="" value="" required>
          </div>

          <div class="row pb-2">
              <label for="nascimento">Data de Nascimento: </label>
              <input type="date" name ="nasc" class="form-control" id="nascimento" placeholder="" value="" required>
          </div>

          <div class="row pb-2">
              <label for="endereco">Endereço: </label>
              <input type="text" name ="endereco" class="form-control" id="endereco" placeholder="" value="" required>
          </div>

          <div class="row pb-2">
              <label for="bairro">Bairro: </label>
              <input type="text" name ="bairro" class="form-control" id="bairro" placeholder="" value="" required>
          </div>
    
          <div class="row pb-2">
              <label for="cep">CEP: </label>
              <input type="text" name= "cep" class="form-control" id="cep" placeholder="" value="" required>
          </div>

          <div class="row pb-2">
              <label for="estado">Estado: </label>
              <select class="custom-select d-block w-100" name= "estado" id="estado" required>
                <option value="" disabled selected>
                  Selecione 
                </option>
        
                <option value="RJ">
                  Rio de Janeiro
                </option>
        
                <option value="SP">
                  São Paulo
                </option>
        
                <option value="MG">
                  Minas Gerais
                </option>
        
                <option value="ES">
                  Espirito Santo
                </option>
              </select>
          </div>

          <div class="row pb-2">
              <label for="cidade">Cidade: </label>
              <input type="text" name ="cidade" class="form-control" id="cidade" placeholder="" value="" required>
          </div>

          <div class="row pb-2">
              <label for="tel">Telefone: </label>
              <input type="tel" name ="tel" class="form-control" id="tel" placeholder="2222-2222" pattern="[0-9]{4}-[0-9]{4}" required>
          </div>

          <div class="row pb-2">
              <label for="cel">Celular: </label>
              <input type="tel" name ="cel" class="form-control" id="cel" placeholder="99999-9999" pattern="[0-9]{5}-[0-9]{4}" required>
          </div>

          <div class="row pb-2">
              <label for="inscricao">Inscrição Estadual: </label>
              <input type="text" name ="inscricao" class="form-control" id="inscricao" placeholder="" value="" required>
          </div>

          <div class="row pb-3">
              <label for="obs">Observações: </label>
              <textarea class="form-control" name="observacao" id="obs" rows="4" cols="50"></textarea>
          </div>

          <button class="btn btn-primary w-100 py-2 " name= "enviar" type="submit">Salvar</button>

        </form>

      </main>
    
    </body>
  
</html>
  