// ------------------ Cadastro dos produtos ------------------
document.getElementById('cadastro-area')
.addEventListener('submit', async event => {
    // event.preventDefault()

    const formData = new FormData(event.target)
    const response = await fetch(`query.php`, {
        method: 'POST',
        body: formData
    })

    if (response.ok) location.reload()
})

// ------------------ Opções de produtos disponíveis e mais informações ------------------
const opcaoProdutos = document.getElementById('opcao-produtos'),
infoProdutos = document.getElementById('info-produtos')

document.addEventListener('DOMContentLoaded', async () => {
    const response = await fetch(`query.php?opcao-produtos=${opcaoProdutos.value}`),
    data = await response.json()

    infoProdutos.innerHTML = `CÓDIGO DO PRODUTO: <strong>${data.id}</strong>
    <br>ESTOQUE DISPONÍVEL: <strong>${data.quantidade} unidades</strong>
    <br>PREÇO ATUAL: <strong>R$${String(data.preco).replace('.', ',')}</strong>`
})

opcaoProdutos.addEventListener('click', async event => {
    const response = await fetch(`query.php?opcao-produtos=${event.target.value}`),
    data = await response.json()

    infoProdutos.innerHTML = `CÓDIGO DO PRODUTO: <strong>${data.id}</strong>
    <br>ESTOQUE DISPONÍVEL: <strong>${data.quantidade} unidades</strong>
    <br>PREÇO ATUAL: <strong>R$${String(data.preco).replace('.', ',')}</strong>`
})

// ------------------ Alteração/atualização dos dados existentes ------------------
const botaoEditar = document.getElementById('botao-editar'),
idProdutos = document.querySelectorAll('.id-produto')

botaoEditar.addEventListener('click', async () => {    
    const nomeEditado = prompt('Digite o nome do produto:')
    if (!nomeEditado) return

    const quantidadeEditada = parseInt(prompt('Informe a quantidade atual:'))
    if (!quantidadeEditada) return

    const precoEditado = parseFloat(prompt('Informe o preço atual:'))
    if (!precoEditado) return

    const formData = new FormData()

    formData.append('id-produto', opcaoProdutos.value)
    formData.append('nome-produto', nomeEditado)
    formData.append('quantidade-produto', quantidadeEditada)
    formData.append('preco-produto', precoEditado)

    // console.log(Object.fromEntries(formData.entries()))

    const response = await fetch('update.php', {
        method: 'POST',
        body: formData
    })

    if (response.ok) location.reload()
})

// ------------------ Produtos cadastrados e exclusão ------------------
const produtosCadastrados = document.querySelectorAll('.produto-cadastrado')

document.getElementById('botao-deletar')
.addEventListener('click', async () => {
    const confirmado = confirm('Tem certeza que deseja deletar os itens marcados?')
    
    if (confirmado) {
        const params = new URLSearchParams()

        produtosCadastrados.forEach(produtoCadastrado => {
            if (produtoCadastrado.checked)
                params.append('produtos[]', produtoCadastrado.value)
        })

        const response = await fetch(`query.php?${params.toString()}`)

        if (response.ok) { 
            produtosCadastrados.forEach(produtoCadastrado => {
                if (produtoCadastrado.checked) 
                    produtoCadastrado.parentElement?.remove()
            })

            location.reload()
        }
    }
})

// ------------------ Filtrando os produtos pelo campo de busca ------------------
const buscaProdutos = document.getElementById('busca-produtos'),
infoProdutosCadastrados = document.querySelectorAll('.info-produto-cadastrado')

buscaProdutos.addEventListener('input', event => {
    const nomeBuscado = event.target.value.toLowerCase()
    .trim().normalize('NFD').replace(/[\u0300-\u036f]/g, '')
    
    infoProdutosCadastrados.forEach(infoProdutoCadastrado => {
        const textContentInfoProduto = infoProdutoCadastrado.textContent
        .toLowerCase().trim().normalize('NFD').replace(/[\u0300-\u036f]/g, '')

        if (textContentInfoProduto.includes(nomeBuscado))
            infoProdutoCadastrado.style.display = 'block'
        else
            infoProdutoCadastrado.style.display = 'none'
    })
})
