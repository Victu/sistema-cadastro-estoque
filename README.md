# 📦 Sistema de Cadastro e Controle de Estoque

Sistema simples de cadastro de produto e controle de estoque que desenvolvi com PHP, MySQL, JavaScript e Docker.<br>
OBSERVAÇÃO: O sistema ainda não está estilizado; contudo, será estilizado numa próxima atualização.

## 🚀 Tecnologias Utilizadas

<p align="left">
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" width="50">
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" width="50">
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" width="50">
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" width="50">
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" width="50">
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/docker/docker-original.svg" width="50">
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg" width="50">
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/github/github-original.svg" width="50">
</p>

## ✨ Recursos

* Cadastro de produtos
* Consulta de estoque em tempo real
* Editar e atualizar informações dos produtos
* Exclusão de produtos
* Atualização assíncrona utilizando AJAX
* Banco de dados inicializado automaticamente via Docker

## 🗂️​ Estrutura do Projeto

```text
.
├── index.php
├── query.php
├── update.php
├── connection.php
├── ajax.js
├── Dockerfile
├── docker-compose.yml
├── .env.example
├── style.css
└── db/
    └── dump-estoque.sql
```

## 🐳 Executando com Docker

### 1. Clone o repositório

```bash
git clone https://github.com/victu/sistema-cadastro-estoque.git
cd sistema-cadastro-estoque
```

### 2. Crie o arquivo `.env`

Copie o arquivo de exemplo:

```bash
cp .env.example .env
```

Ou crie manualmente:

```env
MYSQL_ROOT_PASSWORD=sua_senha
```

### 3. Inicie os containers

```bash
docker compose up --build
```

### 4. Acesse a aplicação

```text
http://localhost:8000
```

## 🗄️ Banco de Dados

O banco de dados é criado automaticamente durante a primeira execução do Docker.

Caso seja necessário recriar o banco do zero:

```bash
docker compose down -v
docker compose up --build
```

## ⚙️ Como Funciona

O projeto utiliza dois containers:

* **PHP**: responsável pela aplicação web.
* **MySQL**: responsável pelo armazenamento dos dados.

A comunicação entre os containers é realizada pela rede interna do Docker.

## 💡 Funcionalidades Implementadas

### Cadastro de Produtos

Permite cadastrar:

* Nome do produto
* Quantidade em estoque
* Preço

### Consulta de Estoque

Ao selecionar um produto, o sistema exibe a quantidade disponível em estoque sem recarregar a página.

### Atualização de Produtos

É possível editar e atualizar dados dos produtos cadastrados no sistema.

### Exclusão de Produtos

Permite selecionar múltiplos produtos e removê-los do sistema.

## ℹ️ Informações adicionais

Inicialmente, este projeto também foi meu objeto de estudo para pôr em pratica meus conhecimentos sobre:

* PHP
* MySQL
* Manipulação de banco de dados
* Requisições assíncronas com JavaScript
* Docker e Docker Compose
* Estruturação de aplicações web
