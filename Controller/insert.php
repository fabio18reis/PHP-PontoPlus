<?php
include_once '../config.php';

// Assuming your config.php defines $dsn, $user, $password, $dbname
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $conn->real_escape_string($_POST['nome']);
    // You need to get these fields from the form or set default values
    $data = date('Y-m-d', strtotime($_POST['data'] ?? 'now'));
    $inicio = date('H:i:s', strtotime($_POST['inicio'] ?? 'now'));
    $fim = date('H:i:s', strtotime($_POST['fim'] ?? 'now'));
    $almoco = date('H:i:s', strtotime($_POST['almoco'] ?? 'now'));
    $volta_almoco = date('H:i:s', strtotime($_POST['volta_almoco'] ?? 'now'));

    $sql = "INSERT INTO registros_horas (`data`, `inicio`, `fim`, `almoco`, `volta_almoco`, `usuario_id`) 
    VALUES ('$data','$inicio','$fim', '$almoco', '$volta_almoco','$nome')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro inserido com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}

?>

<form method="post" action="">
    Nome: <input type="text" name="nome" required><br>
    Horas: <input type="number" name="horas" required><br>
    <input type="submit" value="Inserir">
</form>