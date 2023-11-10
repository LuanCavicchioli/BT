<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";
    require_once $_SERVER['DOCUMENT_ROOT'] ."/includes/alerta.php";
    session_start();

    class Usuario{

        protected $db;  
        protected $table = "usuario";

        public function __construct()
        {
            $this->db = DBConexao::getConexao();
        }
        public function cadastrar($dados)
        {
            try {
                $sql = "INSERT INTO {$this->table} (nome, senha, cpf, email, fone)
                VALUES (:nome,:senha,:cpf,:email,:fone)";
                $stmt = $this->db->prepare($sql);
        
                $stmt->bindParam(':nome', $dados['nome']);
                $stmt->bindParam(':senha', $dados['senha']);
                $stmt->bindParam(':cpf', $dados['cpf']);
                $stmt->bindParam(':email', $dados['email']);
                $stmt->bindParam(':fone', $dados['fone']);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo "Erro Ao Cadastrar: " . $e->getMessage();
                return false;
            }   
        }
        public static function autenticarLogin($email, $senha){
            try{
                $query = "SELECT id_usuario, email, senha FROM usuario WHERE email=:email ";
                $conexao = DBConexao::getConexao();
    
                $stmt = $conexao->prepare($query);
                $stmt->bindParam(':email', $email); 
                $stmt->execute(); 
    
                if($stmt->rowCount() === 1){
                    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                    if(password_verify($senha, $usuario["senha"])){
                        return $usuario;
                    }else{
                        $_SESSION['erro'] = "E-mail ou senha incorretos!"; 
                        return false; 
                    }
                }else{
                    $_SESSION['erro'] = "E-mail ou senha incorretos!"; 
                    return false; 
                }
            }catch(PDOException $e){
                echo "Erro na inserção". $e->getMessage();
                return false; 
            }
        }

        public function buscaId($id){
            try {
                $sql = "SELECT * FROM {$this->table} WHERE id_usuario = :id_usuario";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':id_usuario', $id, PDO::PARAM_INT);
                $stmt->execute();
    
                if ($stmt->rowCount() === 1) {
                    return $stmt->fetch(PDO::FETCH_ASSOC);
                } else {
                    return false; 
                }
            } catch (PDOException $e) {
                echo "Erro na busca por ID: " . $e->getMessage();
                return false;
            }
        }

        public function listar()
        {
            try {
    
                $sql = "SELECT * FROM {$this->table}";
                $stmt = $this->db->query($sql);
                return $stmt->fetchALL(PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                echo "Erro Na Listagem:" . $e->getMessage();
                return null;
            }
        }
        public function excluir($id_usuario)
        {
            try {
                $sql = "DELETE FROM {$this->table} WHERE id_usuario=:id_usuario";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo "Erro na hora de deletar:" . $e->getMessage();
                return false;
            }
        }
    
    }

  
?>