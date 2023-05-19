// connexion a la BD : done
// validation : TODO
// if user exist => redirection vers index.php : done
// sinon erreur : done

<?php
session_start();

require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifier les informations d'identification dans la base de données
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user) {
        //"Connexion réussie ! Bienvenue, " . $user['username'] . " !";
        $_SESSION["username"] = $username;
        header("Location: index.php");
        exit();
    } else {
        //"Nom d'utilisateur ou mot de passe incorrect.";
        header('Location: login.php?error=1');
    }
}

$conn = null;
?>
