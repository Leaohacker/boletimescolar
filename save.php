<?php
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

// Recuperação dos dados enviados pelo formulário
$nome = $_POST['nome'];
$disciplina = $_POST['disciplina'];
$nota1 = $_POST['nota1'];
$nota2 = $_POST['nota2'];

// Validações adicionais dos dados recebidos (se necessário)

// Cálculo da média
$media = ($nota1 + $nota2) / 2;

// Inserção dos dados no banco de dados
$sql = "INSERT INTO alunos (nome, disciplina, nota1, nota2, media) VALUES ('$nome', '$disciplina', '$nota1', '$nota2', '$media')";

if ($conn->query($sql) === TRUE) {
    echo "Os dados foram salvos com sucesso.";
} else {
    echo "Erro ao salvar os dados: " . $conn->error;
}

$conn->close();
?>
    