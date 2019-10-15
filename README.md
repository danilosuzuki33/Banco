# Banco

Especificação para teste de conhecimento em programação e POO

Objetivo: Deve-se elaborar um sistema equivalente a uma conta bancária utilizando conceitos de POO.

Requisitos:

Linguagem: PHP
Banco de dados: MySQL e/ou MariaDB

Descrição das features:

1 - A conta deve ter número da conta corrente e número da agencia;
2 - Deve ser possível fazer depósitos, saques e transferência entre contas utilziando o número da conta e o número da agência;
3 - Ter diferentes tipo de conta:
	Conta básica
	Conta premium -> Para cada depósito feito neste tipo de conta deve-se adicionar +1 no valor do depósito
	Conta salário -> Para cada retirada deve-se subtrair -1 no valor do saque
4 - Todas as transações devem manter histórico para emissão de extrato

# Instruções

1) Procure no diretório model o arquivo Config.class.php. Abra-o e altere-o conforme as suas necessidades.
2) Execute o arquivo douglas.sql encontrado na raíz do projeto para criação do DB e suas tabelas.
2.1) Caso alterar o nome do banco de dados, lembre-se de alterar as configurações do arquivo Config.class.php para o nome referente ao banco de dados criado.
