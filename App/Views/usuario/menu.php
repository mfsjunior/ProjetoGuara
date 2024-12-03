<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Usuário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .content {
            padding: 20px;
        }
        .option-container {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin: 15px 0;
            padding: 20px;
            cursor: pointer;
            transition: 0.3s;
        }
        .option-container:hover {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .option-content {
            display: none;
            margin-top: 10px;
        }
        .option-content.active {
            display: block;
        }
        input, select, button {
            margin: 10px 0;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 100%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        button.edit, button.delete {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 14px;
        }
        button.delete {
            background-color: #dc3545;
        }
        button.edit:hover {
            background-color: #0056b3;
        }
        button.delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="content">
        <h2>Menu do Usuário (Admin)</h2>

        <!-- Alterar Senha -->
        <div class="option-container" onclick="toggleOption('alterar-senha')">
            Alterar Senha
            <div id="alterar-senha" class="option-content">
                <label for="newPassword">Digite a nova senha:</label>
                <input type="password" id="newPassword" placeholder="Nova senha">
                <button onclick="alert('Senha alterada com sucesso!')">Salvar</button>
            </div>
        </div>

        <!-- Configurações -->
        <div class="option-container" onclick="toggleOption('configuracoes')">
            Configurações
            <div id="configuracoes" class="option-content">
                <label for="username">Nome de usuário:</label>
                <input type="text" id="username" placeholder="Seu nome de usuário">
                <label for="email">Email:</label>
                <input type="email" id="email" placeholder="Seu email">
                <button onclick="alert('Configurações salvas!')">Salvar</button>
            </div>
        </div>

        <!-- Adicionar Foto -->
        <div class="option-container" onclick="toggleOption('adicionar-foto')">
            Adicionar Foto
            <div id="adicionar-foto" class="option-content">
                <input type="file" id="photoUpload">
                <button onclick="alert('Foto adicionada com sucesso!')">Enviar Foto</button>
            </div>
        </div>

        <!-- Consultar e Gerenciar Produtos -->
        <div class="option-container" onclick="toggleOption('consultar-produtos')">
            Consultar e Gerenciar Produtos
            <div id="consultar-produtos" class="option-content">
                <table id="productTable">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Quantidade</th>
                            <th>Validade</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Notebook</td>
                            <td>10</td>
                            <td>12/2025</td>
                            <td>
                                <button class="edit" onclick="editProduct(this)">Editar</button>
                                <button class="delete" onclick="deleteProduct(this)">Excluir</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Mouse</td>
                            <td>50</td>
                            <td>06/2026</td>
                            <td>
                                <button class="edit" onclick="editProduct(this)">Editar</button>
                                <button class="delete" onclick="deleteProduct(this)">Excluir</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button onclick="addNewProduct()">Adicionar Novo Produto</button>
            </div>
        </div>
    </div>

    <script>
        function toggleOption(optionId) {
            document.getElementById(optionId).classList.toggle('active');
        }

        function deleteProduct(button) {
            button.closest('tr').remove();
            alert('Produto excluído com sucesso!');
        }

        function editProduct(button) {
            const row = button.closest('tr');
            const cells = row.querySelectorAll('td');
            const name = prompt('Digite o novo nome do produto:', cells[0].textContent);
            const quantity = prompt('Digite a nova quantidade:', cells[1].textContent);
            const validity = prompt('Digite a nova validade (MM/AAAA):', cells[2].textContent);
            if (name) cells[0].textContent = name;
            if (quantity) cells[1].textContent = quantity;
            if (validity) cells[2].textContent = validity;
            alert('Produto atualizado com sucesso!');
        }

        function addNewProduct() {
            const name = prompt('Digite o nome do novo produto:');
            const quantity = prompt('Digite a quantidade:');
            const validity = prompt('Digite a validade (MM/AAAA):');
            if (name && quantity && validity) {
                const table = document.getElementById('productTable').querySelector('tbody');
                const newRow = `<tr>
                    <td>${name}</td>
                    <td>${quantity}</td>
                    <td>${validity}</td>
                    <td>
                        <button class="edit" onclick="editProduct(this)">Editar</button>
                        <button class="delete" onclick="deleteProduct(this)">Excluir</button>
                    </td>
                </tr>`;
                table.insertAdjacentHTML('beforeend', newRow);
                alert('Produto adicionado com sucesso!');
            } else {
                alert('Preencha todas as informações para adicionar um novo produto.');
            }
        }
    </script>
</body>
</html>
