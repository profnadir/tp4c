<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <h2 class="mt-4">Inscription</h2>
                <?php if(isset($_GET['error'])) { ?>
                    <div class="alert alert-danger">Erreur lors de l'inscription. Veuillez réessayer</div>
                <?php } ?>
                <?php if(isset($_GET['exist'])) { ?>
                    <div class="alert alert-danger">Un utilisateur avec le même nom d'utilisateur ou la même adresse e-mail existe déjà.</div>
                <?php } ?>
                <form method="POST" action="post_register.php">
                    <div class="mb-3">
                        <label for="username" class="form-label">Nom d'utilisateur:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">S'inscrire</button>
                    <a href="login.php">Se connecter</a>
                </form>
            </div>
        </div>
    </div>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
