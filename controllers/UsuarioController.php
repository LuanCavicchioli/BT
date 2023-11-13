<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Usuario.php";

class UsuarioController
{
    private $usuarioModel;
    private $db;

    public function __construct()
    {
        $this->usuarioModel = new Usuario();
        $this->db = DBConexao::getConexao();
    }

    public function listarUsuarios()
    {
        return $this->usuarioModel->listar();
    }

    public function cadastrarUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'nome' => $_POST['nome'],
                'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT),
                'cpf' => $_POST['cpf'],
                'email' => $_POST['email'],
                'telefone' => $_POST['telefone'],
                'perfil' => $_POST['perfil']
            ];

            $this->usuarioModel->cadastrar($dados);
            exit;
        }
    }

    public function loginUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            if (empty($email)) {
                header("Location: login.php?error=E-mail é obrigatório");
                exit();
            } else if (empty($senha)) {
                header("Location: login.php?error=A senha é obrigatória");
                exit();
            } else {
                $usuario = Usuario::autenticarLogin($email, $senha);
                if ($usuario) {
                    session_start();
                    $_SESSION['id_usuario'] = $usuario['id_usuario'];
                    header("Location:/admin/infos/planos.php");
                } else {
                    header("Location:/admin/usuarios/index.php?error=E-mail ou senha inválidos");
                    exit();
                }
            }
        }
    }

    public function usuarioLogado()
    {
        session_start();
        if (isset($_SESSION['id_usuario'])) {
            $idUsuario = $_SESSION['id_usuario'];
            $usuario = $this->usuarioModel->buscaId($idUsuario);

            if ($usuario) {
                return $usuario;
            }
        }

        return null;
    }

    public function getUsuario()
    {
        session_start();
        if (isset($_SESSION['id_usuario'])) {
            $idUsuario = $_SESSION['id_usuario'];
            $usuario = $this->usuarioModel->buscaId($idUsuario);

            if ($usuario) {
                return $usuario->id_usuario;
            }
        }
    }

    public function getInformacoesPerfil()
    {
        if ($this->usuarioLogado()) {
            $idUsuarioLogado = $_SESSION['id_usuario'];

            $sql = "SELECT nome, email, cpf, telefone FROM usuario WHERE id_usuario = :id_usuario";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id_usuario', $idUsuarioLogado, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public function excluirUsuario()
    {
        $this->usuarioModel->excluir($_GET['id_usuario']);
        header('Location: /admin/admin/admnistrativo.php');
        exit;
    }

    public function editarUsuario()
    {
        $id_usuario = $_GET['id_usuario'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['senha']) && !empty($_POST['senha'])) {
                $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            } else {
                $usuario = $this->usuarioModel->buscar($id_usuario);
                $senha = $usuario->senha;
            }

            $dados = [
                'nome' => $_POST['nome'],
                'senha' => $senha,
                'cpf' => $_POST['cpf'],
                'email' => $_POST['email'],
                'telefone' => $_POST['telefone'],
                'perfil' => $_POST['perfil']
            ];

            $this->usuarioModel->editar($id_usuario, $dados);

            header('Location: /admin/admin/admnistrativo.php');
            exit;
        }

        return $this->usuarioModel->buscar($id_usuario);
    }
}

?>
