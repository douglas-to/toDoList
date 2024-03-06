<?php 
    include_once('db.php');

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM register WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password, $user['password'])){
            session_start();
            $_SESSION['id'] = $user['id'];
            header('Location: ../pages/list.php');
            exit();
        }else{
            header('Location: ../index.php?error=data_err');
        }

    }
?>