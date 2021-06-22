# ClubSystem Softwares

## Introdução
Este é um teste para verificação de habilidades necessárias para desenvolvimento das aplicações da Clubsystem

## O que deve ser feito
O sistema deve ser dividido em duas etapas: O Front e o back. Os dois devem ser implementados na mesma aplicação, sem a necessidade de um outro serviço para execução de somente o front-end

### Front-end
* Deve ser desenvolvido em Vue js e Bootstrap
* Deve conter as seguintes telas
  * Tela de login
  * Tela de listagem de produtos, com paginação
  * Tela de criação / edição de produtos
  * Tela para apagar um produto
  * Tela de logoff

### Back-end
* Deve conter autenticação utilizando `Laralve Passport` ou `Laravel Sanctum`
* Deve conter um model de produtos utilizando a seguinte estrutura
  * id
  * descricao
  * valor
  * quantidade
  * created_at
  * updated_at
  * deleted_at
* O backend deve retornar os dados de forma estruturada em formato JSON
* As rotas relacionadas aos produtos devem ser protegidas pela autenticação
* Testes automatizados devem ser implementados

## Prazo
O prazo para entrega é de 3 dias, a contar do recebimento do link deste repositório

## Instruções de entrega
* Clonar o projeto e fazer as implementações necessárias
* Após o término, criar um `pull request` contendo seu nome
* As implementações somente serão avaliadas mediante envio de `pull request`
