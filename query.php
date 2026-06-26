<?php 

include_once 'connection.php';

// Consultar banco de dados
$result = $connect->query("SELECT * FROM estoque.produtos 
ORDER BY nome_produto ASC");

// Armazenar todos os dados consultados para que sejam reutilizáveis no index.php
$produtos_cadastrados = $result->fetch_all(MYSQLI_ASSOC);

if (isset($_GET['opcao-produtos'])) {
    $id_opcao_produtos = (int) $_GET['opcao-produtos'];

    $info_produto = [
        'id' => $connect->query("SELECT id_produto 
        FROM estoque.produtos 
        WHERE id_produto = $id_opcao_produtos")->fetch_all(),

        'nome' => $connect->query("SELECT nome_produto 
        FROM estoque.produtos 
        WHERE id_produto = $id_opcao_produtos")->fetch_all(),

        'quantidade' => $connect->query("SELECT quantidade_produto 
        FROM estoque.produtos 
        WHERE id_produto = $id_opcao_produtos")->fetch_all(),

        'preco' => $connect->query("SELECT preco_produto 
        FROM estoque.produtos 
        WHERE id_produto = $id_opcao_produtos")->fetch_all()
    ];

    header('Content-Type: application/json');

    echo json_encode($info_produto);

    exit;
}

// Inserindo dados ao banco de dados
if (
    isset($_POST['nome-produto'])
    && isset($_POST['quantidade-produto'])
    && isset($_POST['preco-produto'])
) {
    $nome_produto = $_POST['nome-produto'];
    $quantidade_produto = $_POST['quantidade-produto'];
    $preco_produto = $_POST['preco-produto'];

    $connect->query("INSERT INTO estoque.produtos (nome_produto, quantidade_produto, preco_produto) 
    VALUES ('$nome_produto', $quantidade_produto, $preco_produto)");

    exit;
}

// Deletando produtos selecionados
if (isset($_GET['produtos'])) {
    $produtos_marcados = $_GET['produtos']; // Array com o ID de cada produto marcado

    foreach ($produtos_marcados as $id_produto) {
        $connect->query("DELETE FROM estoque.produtos 
        WHERE id_produto = $id_produto");
    }

    exit;
}
