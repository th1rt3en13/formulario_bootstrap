
# Formulário
Este projeto é uma página HTML que utiliza o framework Bootstrap para criar um formulário de cadastro de dados pessoais. A página está configurada para usar o tema escuro do Bootstrap e inclui campos de entrada para vários dados pessoais, como nome, sobrenome, CPF/CNPJ, data de nascimento, endereço, e mais.

## Estrutura do Código

O código é dividido em três seções principais:

1. **Cabeçalho (Head)**:
   - Define a codificação de caracteres e o viewport para responsividade.
   - Inclui a folha de estilos do Bootstrap a partir de um CDN.
   - Inclui uma folha de estilos customizada (`style.css`).

2. **Corpo (Body)**:
   - Define o corpo da página com classes do Bootstrap para alinhamento e espaçamento.
   - Contém um formulário com vários campos de entrada para coletar dados do usuário.

3. **Formulário (Form)**:
   - Contém campos de entrada para nome, sobrenome, tipo de pessoa (física ou jurídica), CPF/CNPJ, data de nascimento, endereço, bairro, CEP, estado, cidade, telefone, celular, inscrição estadual e observações.
   - Cada campo está encapsulado dentro de uma div com classes do Bootstrap para espaçamento.
   - Um botão de envio é fornecido no final do formulário.

## Estrutura do Formulário

### Campos do Formulário

- **Nome**: Campo de texto (`text`) obrigatório.
- **Sobrenome**: Campo de texto (`text`) obrigatório.
- **Tipo de Pessoa**: Campo de seleção (`select`) com opções para Pessoa Física (CPF) e Pessoa Jurídica (CNPJ).
- **CPF/CNPJ**: Campo de texto (`text`) obrigatório.
- **Data de Nascimento**: Campo de data (`date`) obrigatório.
- **Endereço**: Campo de texto (`text`) obrigatório.
- **Bairro**: Campo de texto (`text`) obrigatório.
- **CEP**: Campo de texto (`text`) obrigatório.
- **Estado**: Campo de seleção (`select`) com opções para estados do Brasil (RJ, SP, MG, ES).
- **Cidade**: Campo de texto (`text`) obrigatório.
- **Telefone**: Campo de telefone (`tel`) com um padrão de formato específico (`[0-9]{4}-[0-9]{4}`).
- **Celular**: Campo de telefone (`tel`) com um padrão de formato específico (`[0-9]{5}-[0-9]{4}`).
- **Inscrição Estadual**: Campo de texto (`text`) obrigatório.
- **Observações**: Campo de texto (`textarea`) para informações adicionais.

### Botão de Envio

- **Salvar**: Botão (`button`) do tipo `submit` com estilo do Bootstrap (`btn btn-primary w-100 py-2`).

## Requisitos

- **Bootstrap**: A página utiliza a versão 5.3.3 do Bootstrap. Certifique-se de que o link CDN está acessível para o funcionamento correto dos estilos.
- **Arquivo de Estilos Customizados**: `style.css` (não incluído neste exemplo). Este arquivo pode ser usado para aplicar estilos personalizados adicionais à página.

## Instruções para Uso

1. **Clonar o Repositório:**
   ```bash
   git clone <url-do-repositório>

2. **Abrir o Arquivo HTML:**
- Abra o arquivo index.html em um navegador web para visualizar o formulário.

3. **Modificar o Formulário:**
- Edite o arquivo HTML conforme necessário para adicionar ou remover campos, alterar estilos, ou ajustar a estrutura do formulário.

## Notas Adicionais
- Certifique-se de validar os dados do formulário no lado do servidor após a submissão para garantir a segurança e a integridade dos dados.
- Adicione scripts de validação no lado do cliente, se necessário, para melhorar a experiência do usuário.

Este README fornece uma visão geral do código e instruções sobre como usá-lo e modificá-lo. Sinta-se à vontade para ajustá-lo conforme necessário para atender às suas necessidades específicas.