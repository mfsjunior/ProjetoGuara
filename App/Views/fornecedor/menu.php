<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornecedor - Gerenciamento de Produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            font-size: 24px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        button.edit {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 14px;
        }
        button.edit:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gerenciamento de Produtos - Fornecedor</h1>
        <table id="productTable">
            <thead>
                <tr>
                    <th>Nome do Produto</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Notebook</td>
                    <td>10</td>
                    <td>
                        <button class="edit" onclick="editQuantity(this)">Alterar Quantidade</button>
                    </td>
                </tr>
                <tr>
                    <td>Mouse</td>
                    <td>50</td>
                    <td>
                        <button class="edit" onclick="editQuantity(this)">Alterar Quantidade</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        // Função para editar a quantidade
        function editQuantity(button) {
            const row = button.closest('tr'); // Obtém a linha correspondente
            const quantityCell = row.querySelectorAll('td')[1]; // Segunda célula (Quantidade)
            const currentQuantity = quantityCell.textContent.trim(); // Valor atual

            const newQuantity = prompt('Digite a nova quantidade:', currentQuantity);

            if (newQuantity !== null && !isNaN(newQuantity) && newQuantity > 0) {
                quantityCell.textContent = newQuantity; // Atualiza a quantidade
                alert('Quantidade atualizada com sucesso!');
            } else {
                alert('Quantidade inválida. Tente novamente.');
            }
        }
    </script>
</body>
</html>
