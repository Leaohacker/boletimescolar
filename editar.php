<?php
// Verifica se o parâmetro "id" foi passado na URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Configurações de conexão com o banco de dados
    $servername = "localhost"; // Endereço do servidor
    $username = "root"; // Nome de usuário do banco de dados
    $password = ""; // Senha do banco de dados
    $dbname = "boletim_escolar"; // Nome do banco de dados

    // Conexão com o banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Busca os dados do aluno pelo ID
    $sql = "SELECT * FROM alunos WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nome = $row['nome'];
        $disciplina = $row['disciplina'];
        $nota1 = $row['nota1'];
        $nota2 = $row['nota2'];
        $media = $row['media'];

        // Exibe o formulário de edição com os dados do aluno
        echo '<!DOCTYPE html>
<html>
<head>
  <title>Editar Aluno</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Editar Aluno</h1>
<form class="php-form" action="salvar_edicao.php" method="POST">
  <input type="hidden" name="id" value="' . $id . '">
  <label>Nome:</label>
  <input class="php-input" type="text" name="nome" value="' . $nome . '"><br>
  <label>Disciplina:</label>
  <input class="php-input" type="text" name="disciplina" value="' . $disciplina . '"><br>
  <label>Nota 1:</label>
  <input class="php-input" type="number" name="nota1" value="' . $nota1 . '"><br>
  <label>Nota 2:</label>
  <input class="php-input" type="number" name="nota2" value="' . $nota2 . '"><br>
  <input class="php-button" type="submit" value="Salvar">
</form>
</body>
</html>';
;

    } else {
        echo "Aluno não encontrado.";
    }

    $conn->close();

} else {
    echo "ID do aluno não especificado.";
}
?>
