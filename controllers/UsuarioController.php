<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Usuario.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/alerta.php";

    class UsuarioController{

        private $usuarioModel;

        public function __construct(){
            $this->usuarioModel = new Usuario();
        }

        public function cadastrarUsuario(){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                
                $dados = [
                    'nome' => $_POST['nome'],  
                    'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT), 
                    'cpf' => $_POST['cpf'],   
                    'email' => $_POST['email'], 
                    'fone' => $_POST['fone']
                ];
              

                $this->usuarioModel->cadastrar($dados);
                header('Location: /admin/admin/login.php');
                exit;
            }
        }

        public function loginUsuario(){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $email = $_POST['email']; 
                $senha = $_POST['senha'];
    
                if(empty($email)){
                    header("Location: login.php?error=E-mail é obrigatório."); 
                    exit();
                }else if(empty($senha)){
                    header("Location: login.php?error=A senha é obrigatória.");
                    exit();
                }else{
                    $usuario = Usuario::autenticarLogin($email, $senha);
                    if ($usuario){ 
                        session_start(); 
                        $_SESSION['id_usuario'] = $usuario->id;
                        header("Location:/admin/infos/planos.php"); 
                    }else{
                        echo "E-mail ou senha inválidos"; 
                        header("Location:/admin/infos/planos.php "); 
                    }
                }
            }
        }

        public function usuarioLogado(){
            
            if (isset($_SESSION['id_usuario'])){
                return true;
            }else{
                return false;
            }
        }

        public function getUsuario(){
            session_start();
            if(isset($_SESSION['id_usuario'])){
                $idUsuario = $_SESSION['id_usuario'];
                $usuario = $this->usuarioModel->buscaId($idUsuario);

                if($usuario){
                    return $usuario->id_usuario;
                }
            }
        }
        public function getInformacoesPerfil() {
            if ($this->usuarioLogado()) {
                // Recupere as informações do perfil do usuário com base no ID do usuário logado
                $idUsuarioLogado = $_SESSION['id_usuario']; // Supondo que o ID do usuário esteja na sessão
    
                // Consulta ao banco de dados para recuperar as informações do perfil
                $sql = "SELECT nome, email, cpf, fone FROM usuario WHERE id_usuario = :id_usuario";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':id_usuario', $idUsuarioLogado, PDO::PARAM_INT);
                $stmt->execute();
    
                // Verifique se a consulta foi bem-sucedida
                if ($stmt->rowCount() > 0) {
                    // Retorne os dados do perfil do usuário
                    return $stmt->fetch(PDO::FETCH_ASSOC);
                } else {
                    // Retorne um valor indicando que o perfil não foi encontrado
                    return null;
                }
            } else {
                // Se o usuário não estiver logado, retorne null ou qualquer outra indicação apropriada
                return null;
            }
        }
    }

?>