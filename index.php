<?php
#     CRUD
// C -> Created 
// R -> Read 
// U -> Update
// D -> Delete

require 'config.php';

$sql=$pdo->prepare("SELECT * FROM php");
$sql->execute();
if($sql->rowCount() > 0){ // faço rowCount() > 0 para verificar se tem algum registro 
    $lista=$sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<a href="addCrud.php">Adicionar Usuário</a>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
</head>
    <body>
        <table border="1" width="100%">
            <tr>    
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
            </tr>
            <?php foreach($lista as $usuario){ ?>
            <tr>
                <td><?php echo $usuario['id']; ?></td>
                <td><?php echo $usuario['name']; ?></td>
                <td><?php echo $usuario['email'];?></td>
                <td>
                    <a href="editar.php?id=<?php echo $usuario['id'];?>" style="text-decoration: none; color: black; color: green;">[ Editar ]</a>
                    <a href="deletar.php?id=<?php echo $usuario['id'];?>" style="text-decoration: none; color: black; color: red;" onclick=" return confirm('Deseja Deletar?')">[ Deletar ]</a>
                </td>
            </tr>
            <?php 
            }
            ?>
        </table>
    </body>
</html>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="addaction.php" method="POST">
        <h1>Adicionar Usuário</h1>
        <label>
            Nome:<br/>
            <input type="text" name="name" />
        </label>
        <br>
        <label>
            Email:<br/>
            <input type="email" name="email" />
        </label><br/><br/>
    <input type="submit" value="Enviar" />
    </form>  
</body>
</html>
