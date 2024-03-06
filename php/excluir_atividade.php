<?php
    include_once('db.php');
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $atividade_id = $_POST['atividade_id'];

        $stmt = $conn->prepare('DELETE FROM list WHERE id = :atividade_id');
        $stmt->bindParam(':atividade_id', $atividade_id);
        $stmt->execute();

        header('Location: ../pages/list.php');
        exit();
    }
?>