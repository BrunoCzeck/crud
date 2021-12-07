<?php 
		
   $host = '127.0.0.1:3306';
   $usuario ='root';
   $senha = '';
   $banco = 'b7web';
   
try{
    $pdo = new PDO("mysql:dbname=".$banco.";host=".$host, $usuario, $senha);

}
catch (PDOException $e) {
    echo "Erro com Banco de Dados!" . $e->getMessage();
}
catch (Exception $e) {
    echo "Erro Generico!" . $e->getMessage();
}



?> 