<?php
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se os campos necessários foram preenchidos
    if (isset($_POST['id']) && isset($_POST['nome']) && isset($_POST['disciplina']) && isset($_POST['nota1']) && isset($_POST['nota2'])) {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $disciplina = $_POST['disciplina'];
        $nota1 = $_POST['nota1'];
        $nota2 = $_POST['nota2'];

        // Calcula a média das notas
        $media = ($nota1 + $nota2) / 2;

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

        // Atualiza os dados do aluno no banco de dados, incluindo a média
        $sql = "UPDATE alunos SET nome='$nome', disciplina='$disciplina', nota1=$nota1, nota2=$nota2, media=$media WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            header("Location: boletins.php"); // Redireciona para a página boletins.php
            exit();
        } else {
            echo "Erro ao atualizar aluno: " . $conn->error;
        }

        $conn->close();

    } else {
        echo "Todos os campos devem ser preenchidos.";
    }
} else {
    echo "Requisição inválida.";
}
?>
