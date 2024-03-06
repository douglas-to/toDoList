<?php 
    include_once('db.php');


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $conn->prepare("INSERT INTO register (email, password, name) VALUES (:email, :password, :name)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $passwordHash);
        $stmt->bindParam(':name', $name);
        $stmt->execute();

        header('Location: ../pages/loginPage.php');
    }
?>