// Cadastro dos produtos
document.getElementById('register-area')
.addEventListener('submit', async event => {
    //event.preventDefault()

    const formData = new FormData(event.target),
    response = await fetch(`query.php`, {
        method: 'POST',
        body: formData
    })

    if (response.ok) 
        location.reload()
})

// Listagem de opções de produtos disponíveis e mais informações
const produtos = document.getElementById('produtos'),
estoqueInfo = document.getElementById('estoque-info')
let resultado = null

document.addEventListener('DOMContentLoaded', async () => {
    const response = await fetch(`query.php?produto-estoque=${produtos.value}`),
    content = await response.json()

    estoqueInfo.innerHTML = `ESTOQUE: <strong>${content.quantidade}</strong>`
})

produtos.addEventListener('click', async produto => {
    const response = await fetch(`query.php?produto-estoque=${produto.target.value}`),
    content = await response.json()

    estoqueInfo.innerHTML = `ESTOQUE: <strong>${content.quantidade}</strong>`
})

// Produtos cadastrados e exclusão
const produtosCadastrados = document.querySelectorAll('.produto-cadastrado')

document.getElementById('botao-deletar')
.addEventListener('click', async () => {
    const confirmado = confirm('Tem certeza que deseja deletar os itens marcados?')
    const params = new URLSearchParams()
    
    if (confirmado) {
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
