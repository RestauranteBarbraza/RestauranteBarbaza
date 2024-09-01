<?php
$servername = "localhost";
$username = "root";
$password = "9153R@y#";
$dbname = "churrascaria";

// Criar a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}

// Capturar os dados do formulário
$name = $_POST['name'];
$phone = $_POST['phone'];
$num_pessoas = $_POST['person'];
$data_reserva = $_POST['reservation-date'];
$horario_reserva = date("H:i:s", strtotime($_POST['time']));
$mensagem = $_POST['message'];

// Sanitizar dados para prevenir SQL Injection
// Capturar os dados do formulário
$name = $_POST['name'];
$phone = $_POST['phone'];
$num_pessoas = $_POST['person'];
$data_reserva = $_POST['reservation-date'];
$horario_reserva = $_POST['time'];
$mensagem = $_POST['message'];

// Verificar e ajustar o valor do horário
$horario_reserva = date("H:i:s", strtotime($horario_reserva));

// Inserir os dados no banco de dados
$sql = "INSERT INTO reservas (nome, telefone, numero_pessoas, data_reserva, horario_reserva, mensagem)
VALUES ('$name', '$phone', '$num_pessoas', '$data_reserva', '$horario_reserva', '$mensagem')";

if ($conn->query($sql) === TRUE) {
  echo "Reserva registrada com sucesso!";
} else {
  echo "Erro: " . $sql . "<br>" . $conn->error;
}


// Fechar conexão
$conn->close();
?>
