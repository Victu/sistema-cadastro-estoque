<?php require_once'query.php'; ?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="ajax.js" defer></script>
    <title>Sistema de Cadastro e Estoque de Produtos Disponíveis</title>
</head>

<body>
    <header>
        <h1>Cadastro e Estoque de Produtos</h1>
    </header>

    <main>
        <!-- Cadastro de produtos -->
        <form id="cadastro-area">
            <div class="entrada-area">
                <label for="nome-produto">Nome:</label>
                <input type="text" name="nome-produto" id="nome-produto" required>
            </div>
            <div class="entrada-area">
                <label for="quantidade-produto">Quantidade:</label>
                <input type="number" name="quantidade-produto" id="quantidade-produto" min="0" required>
            </div>
            <div class="entrada-area">
                <label for="preco-produto">Preço: R$</label>
                <input type="number" name="preco-produto" id="preco-produto" min="0.01" step="0.01" required>
            </div>
            <button type="submit" id="botao-cadastrar">Cadastrar</button>
        </form>
        <hr>

        <!-- Opções de produtos disponíveis e mais informações -->
        <form>
            <select id="opcao-produtos" name="opcao-produtos">
                <?php foreach($produtos_cadastrados as $produto): ?>
                    <option value="<?= $produto['id_produto'] ?>">
                        <?= $produto['nome_produto'] ?>
                    </option>
                <?php endforeach; ?>
            </select> 

            <section id="info-produtos">
                <!-- Informações das opções de produtos selecionados
                 serão exibidas aqui -->
            </section>

            <button type="button" id="botao-editar">
                Editar
            </button>
        </form>
        <hr>
        
        <!-- Área de busca -->
        <section>
            <input type="search" aria-placeholder="Digite o nome do produto..." 
            placeholder="Digite o nome do produto..." id="busca-produtos">
        </section>
        <!-- Exibição de produtos adicionados e exclusão -->
        <form id="produtos-cadastrados">
            <?php foreach($produtos_cadastrados as $produto): ?>
                <div class="info-produto-cadastrado">
                    <input type="checkbox"
                    id="<?= $produto['id_produto'] ?>"
                    value="<?= $produto['id_produto'] ?>"
                    class="produto-cadastrado">
                    
                    <label for="<?= $produto['id_produto'] ?>" class="nome-produto-cadastrado">
                        <?= $produto['nome_produto'] ?>
                    </label>
                </div>
            <?php endforeach; ?>
            <button type="button" id="botao-deletar">Deletar</button>
        </form>
    </main>
</body>
</html>
