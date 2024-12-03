<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Cliente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
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
    </style>
</head>
<body>
    <h2>Menu do Cliente</h2>

    <!-- Consultar Produtos -->
    <div class="option-container" onclick="toggleOption('cliente-consultar-produtos')">
        Consultar Produtos
        <div id="cliente-consultar-produtos" class="option-content">
            <ul>
                <li>Produto: Notebook | Validade: 12/2025 | Quantidade: 10</li>
                <li>Produto: Mouse | Validade: 06/2026 | Quantidade: 50</li>
            </ul>
        </div>
    </div>

    <!-- Adicionar Foto -->
    <div class="option-container" onclick="toggleOption('cliente-adicionar-foto')">
        Adicionar Foto
        <div id="cliente-adicionar-foto" class="option-content">
            <input type="file" id="clientPhotoUpload">
            <button onclick="alert('Foto enviada com sucesso!')">Enviar Foto</button>
        </div>
    </div>

    <script>
        function toggleOption(optionId) {
            document.getElementById(optionId).classList.toggle('active');
        }
    </script>
</body>
</html>
