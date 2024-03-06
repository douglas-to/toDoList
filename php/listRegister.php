<?php
    include_once('db.php');

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        $title = $_POST['title'];
        $initialDate = $_POST['initialDate'];
        $finalDate = $_POST['finalDate'];
        $description = $_POST['description'];

        $stmt = $conn->prepare("INSERT INTO list (title, initialDate, finalDate, description) VALUES (:title, :initialDate, :finalDate, :description)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':initialDate', $initialDate);
        $stmt->bindParam(':finalDate', $finalDate);
        $stmt->bindParam(':description', $description);
        $stmt->execute();

        header('Location: ../pages/list.php');
    }
?>