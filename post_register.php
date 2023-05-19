// connexion a la bd : done
// validation : TODO
// insert 
// password hash : TODO //echo password_hash("123456", PASSWORD_DEFAULT);
// 1 if user exist => return message(exist) : done
// 2 if error => return message(error) : done
// redirction vers login : done
// deconnection de la BD : done

<?php

require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];//123456

    // se proteger contre sql injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username OR email = :email");

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);

    $stmt->execute();

    $existingUser = $stmt->fetch();

    if ($existingUser) {
        //"Un utilisateur avec le même nom d'utilisateur ou la même adresse e-mail existe déjà.";
        header('Location: register.php?exist=1');
    } else {
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);// 123456 => hash($password) = kjfash145434342#@#
        if ($stmt->execute()) {
            //"Inscription réussie !";
            header('Location: login.php');
            exit();
        } else {
            //"Erreur lors de l'inscription. Veuillez réessayer.";
            header('Location: register.php?error=1');
        }
    }
}

$conn = null;
?>

