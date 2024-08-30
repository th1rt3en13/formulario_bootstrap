<?php
$message = "";
$id = null;
$pessoaData = [
    'nome' => '',
    'sobrenome' => '',
    'pessoa' => '',
    'cpf_cnpj' => '',
    'nasc' => '',
    'endereco' => '',
    'bairro' => '',
    'cep' => '',
    'estado' => '',
    'cidade' => '',
    'tel' => '',
    'cel' => '',
    'inscricao' => '',
    'observacao' => ''
];

// Conexão com o banco de dados
include_once('config.php');

// Verificar se o ID foi passado via query string
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Buscar os dados da pessoa no banco de dados
    $stmt = $conexao->prepare("SELECT * FROM pessoas WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $pessoaData = $result->fetch_assoc();
    } else {
        $message = "Pessoa não encontrada.";
    }

    $stmt->close();
}

// Verificar se o formulário foi enviado
if (isset($_POST['enviar'])) {
    // Inicialização das variáveis com valores enviados via POST
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $sobrenome = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : '';
    $pessoa = isset($_POST['pessoa']) ? $_POST['pessoa'] : '';
    $cpf_cnpj = isset($_POST['cpf_cnpj']) ? $_POST['cpf_cnpj'] : '';
    $nasc = isset($_POST['nasc']) ? $_POST['nasc'] : '';
    $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
    $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
    $cep = isset($_POST['cep']) ? $_POST['cep'] : '';
    $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
    $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
    $tel = isset($_POST['tel']) ? $_POST['tel'] : '';
    $cel = isset($_POST['cel']) ? $_POST['cel'] : '';
    $inscricao = isset($_POST['inscricao']) ? $_POST['inscricao'] : '';
    $observacao = isset($_POST['observacao']) ? $_POST['observacao'] : '';

    // Preparar a consulta SQL com placeholders
    $stmt = $conexao->prepare("INSERT INTO pessoas (nome, sobrenome, tipo_pessoa, cpf_cnpj, data_nascimento, endereco, bairro, cep, estado, cidade, telefone, celular, inscricao_estadual, observacoes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind dos parâmetros
    $stmt->bind_param("ssssssssssssss", $nome, $sobrenome, $pessoa, $cpf_cnpj, $nasc, $endereco, $bairro, $cep, $estado, $cidade, $tel, $cel, $inscricao, $observacao);

    // Executar a consulta
    if ($stmt->execute()) {
        $message = "Dados inseridos com sucesso!";
    } else {
        $message = "Erro ao inserir dados: " . $stmt->error;
    }

    // Fechar a declaração
    $stmt->close();
}
?>



<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet">
  <title>Formulário</title>
</head>
<body class="d-flex align-items-center py-3 bg-body-tertiary">
  <main class="w-100 m-auto form-container">
   
    <form action="formulario.php<?php echo isset($id) ? '?id=' . $id : ''; ?>" method="POST">
      <h1 class="h3 mb-3 fw-normal">Cadastro:</h1>

      <div class="row pb-2">
        <label for="primeiroNome">Nome</label>
        <input type="text" name="nome" class="form-control" id="primeiroNome" value="<?php echo $pessoaData['nome']; ?>" required>
      </div>

      <div class="row pb-2">
        <label for="sobrenome">Sobrenome:</label>
        <input type="text" name="sobrenome" class="form-control" id="sobrenome" value="<?php echo $pessoaData['sobrenome']; ?>" required>
      </div>

      <div class="row pb-2">
        <label for="pessoa">Tipo de Pessoa:</label>
        <select class="custom-select d-block w-100" name="pessoa" id="pessoa" required>
          <option value="" disabled <?php echo empty($pessoaData['pessoa']) ? 'selected' : ''; ?>>Selecione</option>
          <option value="Pessoa Física" <?php echo $pessoaData['pessoa'] == 'Pessoa Física' ? 'selected' : ''; ?>>Pessoa Física</option>
          <option value="Pessoa Jurídica" <?php echo $pessoaData['pessoa'] == 'Pessoa Jurídica' ? 'selected' : ''; ?>>Pessoa Jurídica</option>
        </select>
      </div>

      <div class="row pb-2">
        <label for="cpf_cnpj">CPF/CNPJ:</label>
        <input type="text" name="cpf_cnpj" class="form-control" id="cpf_cnpj" value="<?php echo $pessoaData['cpf_cnpj']; ?>" required>
      </div>

      <div class="row pb-2">
        <label for="nascimento">Data de Nascimento:</label>
        <input type="date" name="nasc" class="form-control" id="nascimento" value="<?php echo $pessoaData['nasc']; ?>" required>
      </div>

      <div class="row pb-2">
        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" class="form-control" id="endereco" value="<?php echo $pessoaData['endereco']; ?>" required>
      </div>

      <div class="row pb-2">
        <label for="bairro">Bairro:</label>
        <input type="text" name="bairro" class="form-control" id="bairro" value="<?php echo $pessoaData['bairro']; ?>" required>
      </div>

      <div class="row pb-2">
        <label for="cep">CEP:</label>
        <input type="text" name="cep" class="form-control" id="cep" value="<?php echo $pessoaData['cep']; ?>" required>
      </div>

      <div class="row pb-2">
        <label for="estado">Estado:</label>
        <select class="custom-select d-block w-100" name="estado" id="estado" required>
          <option value="" disabled <?php echo empty($pessoaData['estado']) ? 'selected' : ''; ?>>Selecione</option>
          <option value="Rio de Janeiro" <?php echo $pessoaData['estado'] == 'Rio de Janeiro' ? 'selected' : ''; ?>>Rio de Janeiro</option>
          <option value="São Paulo" <?php echo $pessoaData['estado'] == 'São Paulo' ? 'selected' : ''; ?>>São Paulo</option>
          <option value="Minas Gerais" <?php echo $pessoaData['estado'] == 'Minas Gerais' ? 'selected' : ''; ?>>Minas Gerais</option>
          <option value="Espírito Santo" <?php echo $pessoaData['estado'] == 'Espírito Santo' ? 'selected' : ''; ?>>Espírito Santo</option>
        </select>
      </div>

      <div class="row pb-2">
        <label for="cidade">Cidade:</label>
        <input type="text" name="cidade" class="form-control" id="cidade" value="<?php echo $pessoaData['cidade']; ?>" required>
      </div>

      <div class="row pb-2">
        <label for="tel">Telefone:</label>
        <input type="tel" name="tel" class="form-control" id="tel" placeholder="2222-2222" pattern="[0-9]{4}-[0-9]{4}" value="<?php echo $pessoaData['tel']; ?>" required>
      </div>

      <div class="row pb-2">
        <label for="cel">Celular:</label>
        <input type="tel" name="cel" class="form-control" id="cel" placeholder="99999-9999" pattern="[0-9]{5}-[0-9]{4}" value="<?php echo $pessoaData['cel']; ?>" required>
      </div>

      <div class="row pb-2">
        <label for="inscricao">Inscrição Estadual:</label>
        <input type="text" name="inscricao" class="form-control" id="inscricao" value="<?php echo $pessoaData['inscricao']; ?>" required>
      </div>

      <div class="row pb-3">
        <label for="obs">Observações:</label>
        <textarea class="form-control" name="observacao" id="obs" rows="4" cols="50"><?php echo $pessoaData['observacao']; ?></textarea>
      </div>

      <button class="btn btn-primary w-100 py-2" name="enviar" type="submit">Salvar</button>
      
      <?php if ($message): ?>
      <div class="mt-3 alert <?php echo strpos($message, 'sucesso') !== false ? 'alert-success' : 'alert-danger'; ?>">
        <?php echo $message; ?>
      </div>
      <?php endif; ?>

    </form>
  </main>
</body>
</html>
