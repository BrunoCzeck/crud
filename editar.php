<?php 
require 'config.php';
$id = filter_input(INPUT_GET, 'id');
if($id){
      $sql = $pdo->prepare("SELECT * FROM php WHERE id = :id");
      $sql->bindValue(':id', $id);
      $sql->execute();
      
      if($sql->rowCount() > 0){
            $info = $sql->fetch(PDO::FETCH_ASSOC);
}else{
            header("Location: index.php");
            exit;
      }
}else{
            header("Location: index.php");
            exit;
      }  

?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="editar_action.php" method="POST">
        <h1>Editar Usuário</h1>
        
        <input type="hidden" name="id" value="<?php echo $info['id']?>" />
        
        <label>
            Nome:<br/>
            <input type="text" name="name" value="<?php echo $info['name']?>" />
        </label>
        <br>
        <label>
            Email:<br/>
            <input type="email" name="email" value="<?php echo $info['email']?>" />
        </label><br/><br/>
    <input type="submit" value="Enviar" />
    </form>  
</body>
</html>