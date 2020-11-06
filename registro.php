<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="teal">
    <div class="card-panel" style="width:400px; margin:0 auto; margin-top:20px; border-radius:10px; font-family:'Raleway', sans-serif;">
        <h3 class="center" style="color:hsl(243, 87%, 12%);">App Links</h3>
        <p class="center">Guarda tus paginas web</p>

        <p class="green-text">
            <?php
                session_start();
                if(isset($_SESSION['resp'])){
                    echo $_SESSION['resp'];
                    unset($_SESSION['resp']);
                }
            ?>
        </p>

        <form action="controllers/Registro.php" method="POST">
            <div class="input-field">
                <input id="email" type="text" name="email">
                <label for="email">Email</label>
            </div>
            <div class="input-field">
                <input id="name" type="text" name="nombre">
                <label for="name">Nombre</label>
            </div>  
            <div class="input-field">
                <input id="pass" type="password" name="pass">
                <label for="pass">Contraseña</label>
            </div>
            <button class="waves-effect waves-light btn ancho-100">Registrarse</button>
        </form>

        <p class="red-text">
            <?php
                if(isset($_SESSION['error'])){
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
            ?>
        </p>

        <br>
        <a href="index.php"><i class="material-icons" style="font-size: 40px;">arrow_back</i></a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>