<?php
include("/databases/DBConexao.php");


$conn = DBConexao::getConexao();


$email = $_POST['email']; 
$cpf = $_POST['cpf']; 

// Consulta SQL para verificar se o usuário existe na tabela "usuarios" usando email e CPF
$query = "SELECT * FROM usuarios WHERE email = :email OR cpf = :cpf";
$stmt = $conn->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':cpf', $cpf);
$stmt->execute();

// Verifica se houve algum resultado retornado pela consulta
if ($stmt->rowCount() > 0) {
   
} else {
 
}
?>