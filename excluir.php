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

    // Exclui o aluno pelo ID
    $sql = "DELETE FROM alunos WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("Location: boletins.php"); // Redireciona para a página boletins.php
        exit();
    } else {
        echo "Erro ao excluir aluno: " . $conn->error;
    }

    $conn->close();

} else {
    echo "ID do aluno não especificado.";
}
?>
