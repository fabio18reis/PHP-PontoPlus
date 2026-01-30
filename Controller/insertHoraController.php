<?php
session_start();
require_once "../Model/insertHoraModel.php";
require_once "config.php";

class InsertHoraController {
    private $model;

    public function __construct($conexao) {
        $this->model = new InsertHoraModel($conexao);
    }

    public function processarRequisicao() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: loginView.php");
            exit();
        }

        $msg = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'data' => $_POST['data'] ?? '',
                'inicio' => $_POST['inicio'] ?? '',
                'fim' => $_POST['fim'] ?? '',
                'almoco' => $_POST['almoco'] ?? '',
                'volta_almoco' => $_POST['volta_almoco'] ?? ''
            ];

            $id_user = $_SESSION['user_id'];
            $agora = date('d/m/Y H:i:s');
            if ($this->model->inserirRegistro($dados, $id_user)) {
                $msg = "Registro inserido com sucesso em $agora!";
                $this->exibirSweetAlert($msg, "success");
            } else {
                $msg = "Erro ao inserir registro em $agora.";
                $this->exibirSweetAlert($msg, "error");
            }
        }
    }

    private function exibirSweetAlert($msg, $type) {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    text: '{$msg}',
                    icon: '{$type}',
                }).then(function() {
                    window.location = '../View/home.php';
                });
            });
        </script>";
    }
}

$controller = new InsertHoraController($conexao);
$controller->processarRequisicao();