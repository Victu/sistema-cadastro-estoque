<?php 

include_once 'connection.php';

if (
    isset($_POST['id-produto'])
    && isset($_POST['nome-produto'])
    && isset($_POST['quantidade-produto'])
    && isset($_POST['preco-produto'])
) {
    $id_produto = $_POST['id-produto'];
    $nome_produto = $_POST['nome-produto'];
    $quantidade_produto = $_POST['quantidade-produto'];
    $preco_produto = $_POST['preco-produto'];

    $connect->query("UPDATE estoque.produtos 
    SET nome_produto = '$nome_produto',
    quantidade_produto = $quantidade_produto,
    preco_produto = $preco_produto
    WHERE id_produto = $id_produto");
}
