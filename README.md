# Sistema de Cadastro e Estoque de Produtos

Um sistema web simples de CRUD (Create, Read, Update, Delete) para gerenciamento de estoque e cadastro de produtos. O projeto foi desenvolvido com PHP (sem frameworks), JavaScript (Fetch API/AJAX) para requisições assíncronas e MySQL para persistência de dados. O ambiente está totalmente configurado com Docker.

## 🚀 Tecnologias Utilizadas

* **Front-end:** HTML5, CSS3, JavaScript Vanilla (AJAX/Fetch API)
* **Back-end:** PHP 8.2
* **Banco de Dados:** MySQL 8.4
* **Infraestrutura:** Docker e Docker Compose

## ⚙️ Funcionalidades

* **Cadastro de Produtos:** Adição de novos produtos com nome, preço e quantidade.
* **Consulta de Estoque:** Visualização assíncrona (sem recarregar a página) da quantidade em estoque ao selecionar um produto no menu.
* **Listagem:** Exibição de todos os produtos cadastrados ordenados alfabeticamente.
* **Exclusão em Massa:** Possibilidade de selecionar múltiplos produtos via *checkbox* e excluí-los do banco de dados de uma só vez.

## 🔧 Como executar o projeto localmente

### Pré-requisitos
Você precisará ter o **Docker** e o **Docker Compose** instalados na sua máquina.

## Executar

docker compose up --build

## Acessar

http://localhost:8000

Projeto desenvolvido com:

- PHP
- MySQL
- JavaScript
- Docker