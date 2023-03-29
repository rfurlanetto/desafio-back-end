# Documentação Projeto

## Como instalar

## Possíveis problemas e como contornar

## Documentação Referência


## Checklist Desafio

- [X] Utilizar migration, factory, faker e seeder.

- [] Desenvolver uma listagem de pacientes com busca, do qual deve-se permitir a adição, edição, visualização e exclusão de cada um dos pacientes.

- [] Cada paciente deve ter um endereço cadastrado em uma tabela à parte.

- [] Utilizar para banco de dados PostgreSQL e Redis (Cache e Queue).

- [] Criar um endpoint para listagem onde seja possível consultar pacientes pelo nome ou CPF.

- [] Criar um endpoint para obter os dados de um único pacientes (paciente e seu endereço).

- [] Criar endpoints de cadastro e atualização de paciente, contendo os campos e suas respectivas validações (Obs: use tudo que o framework(Laravel) te oferece para não criar códigos repetidos e desnecessários):
Foto do Paciente;
Nome Completo do Paciente;
Nome Completo da Mãe;
Data de Nascimento;
CPF;
CNS;

- [] Endereço completo, (CEP, Endereço, Número, Complemento, Bairro, Cidade e Estado)*;

- [] Criar um endpoint para excluir um paciente (paciente e seu endereço).

- [] Criar um endpoint para consulta de CEP que implemente a API do ViaCEP e faça cache (Redis) dos dados para futuras consultas.

- [] Criar um endpoint que faça importação de dados (pacientes) via arquivo .csv e seja processada em queue assincronamente.