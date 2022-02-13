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
<!-- <a href="addCrud.php">Adicionar Usuário</a> -->

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>CRUD</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="estilo/style.css">
        
    </head>
    <body>
        <div class="container"> 
            <div class="scrolltable">
                <table class="table table-dark table-striped mt-1">
                    <tr>    
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                    <?php foreach($lista as $usuario){ ?>
                    <tr>
                        <td><?php echo $usuario['id']; ?></td>
                        <td><?php echo $usuario['name']; ?></td>
                        <td><?php echo $usuario['email'];?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $usuario['id'];?>"  type="button" class="btn btn-success">Editar</a>
                            <a href="deletar.php?id=<?php echo $usuario['id'];?>" type="button" class="btn btn-danger" onclick="return confirm('Deseja Deletar?')">Deletar</a>
                        </td>
                    </tr>
                    <?php 
                    }
                    ?>
                </table>
            </div>
        </div>
        <section class="row justify-content-center mt-3">
            <section class="col-12 col-sm-6 col-md-3">
                <form class="form-container d-grid justify-content-center" action="addaction.php" method="POST">
                    <h1 class="row">Adicionar Usuário</h1>
                    <div class="form-group">
                        Nome:
                        <input class="form-control" type="text" name="name" />
                    </div>
                    <br>
                    <div>
                        Email:
                        <input class="form-control" type="email" name="email" />
                    </div>
                <button class="btn btn-secondary mt-2" type="submit">Enviar</button>
                </form>  
            </section>
        </section>
    </body>
</html>
