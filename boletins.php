<!DOCTYPE html>
<html>
<head>
  <title>Boletins Escolares</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<meta charset="UTF-8">

<body>
    <div class="menu">
        <ul>
            <li><a href="index.html">Cadastro</a></li>
        </ul>
    </div>
  <h1>Boletins Escolares</h1>

  <table>
    <thead>
      <tr>
        <th>Nome</th>
        <th>Disciplina</th>
        <th>Nota 1</th>
        <th>Nota 2</th>
        <th>Média</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
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

      // Busca os dados dos alunos no banco de dados
      $sql = "SELECT * FROM alunos";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              $id = $row['id'];
              $nome = $row['nome'];
              $disciplina = $row['disciplina'];
              $nota1 = $row['nota1'];
              $nota2 = $row['nota2'];
              $media = $row['media'];

              echo "<tr>";
              echo "<td>$nome</td>";
              echo "<td>$disciplina</td>";
              echo "<td>$nota1</td>";
              echo "<td>$nota2</td>";
              echo "<td>$media</td>";
              echo "<td class='actions'>";
              echo "<a href='editar.php?id=$id'>Editar</a>";
              echo "<a href='excluir.php?id=$id'>Excluir</a>";
              echo "</td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='6'>Nenhum aluno encontrado.</td></tr>";
      }

      $conn->close();
      ?>
    </tbody>
  </table>
</body>
</html>
