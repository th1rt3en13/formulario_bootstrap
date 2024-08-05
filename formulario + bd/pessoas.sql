CREATE TABLE pessoas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    sobrenome VARCHAR(255),
    tipo_pessoa VARCHAR(20) NOT NULL,
    cpf_cnpj VARCHAR(20) NOT NULL,
    data_nascimento DATE,
    endereco VARCHAR(255),
    bairro VARCHAR(255),
    cep VARCHAR(10),
    estado VARCHAR(20) NOT NULL,
    cidade VARCHAR(255),
    telefone VARCHAR(15),
    celular VARCHAR(15),
    inscricao_estadual VARCHAR(20),
    observacoes TEXT,
    data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP,
    data_atualizacao DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
