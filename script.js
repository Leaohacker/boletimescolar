document.getElementById('boletimForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Evita que o formulário seja enviado normalmente

  var form = this;
  var formData = new FormData(form);

  // Validação adicional dos campos
  var nota1 = parseFloat(formData.get('nota1'));
  var nota2 = parseFloat(formData.get('nota2'));

  if (isNaN(nota1) || isNaN(nota2) || nota1 < 0 || nota1 > 10 || nota2 < 0 || nota2 > 10) {
    alert('As notas devem ser valores numéricos entre 0 e 10.');
    return;
  }

  // Envio dos dados para o arquivo PHP usando AJAX
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'save.php', true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      alert(xhr.responseText); // Exibe a resposta do servidor
      form.reset(); // Limpa o formulário
    }
  };
  xhr.send(formData);
});
