<?php 

include_once 'connection.php';

// Consultar banco de dados
$result = $connect->query("SELECT * FROM estoque.produtos ORDER BY nome_produto ASC");
// Armazenar todos os dados consultados para que sejam reutilizáveis no index.php
$produtos_cadastrados = $result->fetch_all(MYSQLI_ASSOC);

if (isset($_GET['produto-estoque'])) {
    $produto_estoque = $_GET['produto-estoque'];

    $estoque = [
        'quantidade' => $produto_estoque
    ];

    header('Content-Type: application/json');

    echo json_encode($estoque);

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
    VALUES ('$nome_produto', '$quantidade_produto', '$preco_produto')");

    exit;
}

// Deletando produtos selecionados
if (isset($_GET['produtos'])) {
    $produtos_selecionados = $_GET['produtos']; // Array com os IDs de cada produto

    foreach ($produtos_selecionados as $produto_selecionado_id) {
        $connect->query("DELETE FROM estoque.produtos 
        WHERE id_produto = " . (int) $produto_selecionado_id);
    }

    exit;
}