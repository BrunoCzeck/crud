<?php

require 'config.php';


$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);


if($name && $email){
    

    // Criando verificação 
    $sql = $pdo->prepare("SELECT * FROM php WHERE email = :email");
    $sql -> bindValue(':email', $email);
    $sql -> execute();

    if($sql->rowCount() === 0){
        $sql = $pdo->prepare("INSERT INTO php(name, email) VALUES (:name, :email)");
        $sql->bindValue(':name', $name); // Associando o valor que eu mando
        $sql->bindValue(':email', $email); // Associando o valor que eu mando
        $sql->execute();
        //$sql->bindParam(':email', $email); // Associo o proprio parametro a variavel e-mail
        header("Location: index.php");
        exit;
    }else {
        header("Location : addcrud.php"); 
        // Fim da Verificação 
    }
}else{
    header("Location: addcrud.php");
    exit;
}


?>