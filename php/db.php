<?php 
    
    $host = 'localhost';
    $db = 'todolist';
    $user = 'root';
    $password = '';
    
    $dsn = "mysql:host={$host};dbname={$db}";

    try{

        $conn = new PDO($dsn, $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }catch(PDOException $e){

        echo 'Erro ao tentar se conectar ao banco de dados: ' . $e->getMessage();
    }
?>