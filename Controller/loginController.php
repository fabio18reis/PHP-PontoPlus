<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>
    <?php
    require_once "../Model/loginModel.php";


    class AuthController
    {
        private $conexao;
        private $userModel;

        public function __construct($conexao, $userModel)
        {
            $this->conexao = $conexao;
            $this->userModel = $userModel;
        }

        public function login($email, $senha)
        {
            // Verifica se o email e senha foram fornecidos e se a conexão com o banco de dados está disponível
            if (!empty($email) && !empty($senha) && $this->conexao !== null) {
                $user = $this->userModel->getUserByEmail($email);

                // Verifica se há resultados para o email fornecido
                if ($user) {
                    $senha_hash_banco = $user['user_password'];

                    // Verifica se a senha fornecida corresponde à senha armazenada no banco de dados
                    if (password_verify($senha, $senha_hash_banco)) {
                        $this->startSession($user);
                    } else {
                        $this->redirectToLoginPage("Senha ou Email Incorretos!");
                    }
                } else {
                    $this->redirectToLoginPage("Realize Login!");
                }
            } else {
                $this->redirectToLoginPage();
            }
        }

        private function startSession($user)
        {
            session_start();
            $_SESSION['user_logged_in'] = true;
            $_SESSION['user_profile_name'] = $user['user_name'];
            $_SESSION['user_id'] = $user['id_user'];
            $_SESSION['user_email'] = $user['user_email'];

            // ... outras variáveis de sessão

            $welcome_message = "Bem-vindo, " . $user['user_name'] . "! <br>Aproveite!";

            echo "<script language='javascript' type='text/javascript'>
                var welcomeMessage = '$welcome_message';
                Swal.fire({
                    html: '<div style=\"font-size: 18px; color: blue; font-style: italic\">' + welcomeMessage + '</div>',
                    icon: 'success',
                }).then(function() {
                    window.location = '../View/home.php';
                });
            </script>";
        }

        private function redirectToLoginPage($message = null)
        {
            echo "<script language='javascript' type='text/javascript'>
                var Message = '$message';
                Swal.fire({
                    text: Message,
                    icon: 'warning',
                }).then(function() {
                    window.location = '../index.php';
                });
              </script>";
        }
    }

    $authController = new AuthController($conexao, new UserModel($conexao));

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $senha = $_POST['password'];
        $email = $_POST['email'];
        $authController->login($email, $senha);
    } else {
        $message = "Informações Faltando";
    }

    ?>
</body>

</html>