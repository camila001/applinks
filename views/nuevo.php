<?php
    use models\Link as Link;
    session_start();
    require_once("../models/Link.php");
    if(isset($_SESSION['usuario'])){
        $model = new Link();
        $links = $model->getAllLinks($_SESSION['usuario']['email']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Links</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="teal">
    <?php if(isset($_SESSION['usuario'])){ ?>
        <nav class="grey darken-4">
            <div class="nav-wrapper">
            <a href="#" class="brand-logo" style="margin-left: 20px; font-family:'Raleway', sans-serif;">Hola <?=$_SESSION['usuario']['nombre']; ?>!</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down" style="margin-right: 20px; font-family:'Raleway', sans-serif;">
                <li><a href="salir.php"><i class="material-icons" style="font-size: 40px;">exit_to_app</i></a></li>
            </ul>
            </div>
        </nav>

        <div class="card-panel" style="width: 1200px; margin:0 auto; margin-top:20px; border-radius:10px; font-family:'Raleway', sans-serif;">
            <div class="row">
                <div class="col l4 m4 s12">
                    <h4 style="font-family:'Raleway', sans-serif; color:hsl(243, 87%, 12%);">Añadir Link</h4>
                    <br>
                    <p class="green-text">
                        <?php
                            if(isset($_SESSION['resp'])){
                                echo $_SESSION['resp'];
                                unset ($_SESSION['resp']);
                            }
                        ?>
                    </p>
                    <form action="../controllers/NuevoLink.php" method="POST">
                        <div class="input-field">
                            <input id="name" type="text" name="nombre">
                            <label for="name">Nombre de la página</label>
                        </div>    
                        <div class="input-field">
                            <input id="d" type="text" name="link">
                            <label for="d">URL de la página</label>
                        </div>    
                        <button class="btn waves-effect waves-light">Guardar Pagina</button>
                    </form>

                    <p class="red-text">
                    <?php
                        if(isset($_SESSION['error'])){
                            echo $_SESSION['error'];
                            unset ($_SESSION['error']);
                        }
                    ?>
                </p>

                </div>
                <div class="col l8 m8 s12">
                    <h4 style="font-family:'Raleway', sans-serif; color:hsl(243, 87%, 12%);">Mis Links</h4>
                    <form action="../controllers/EliminarLink.php" method="POST">
                        <table>
                            <tr>
                                <td>Nombre de la página</td>
                                <td>URL</td>
                            </tr>
                            <?php foreach($links as $item){ ?>
                                <tr>
                                    <td><?= $item['nombre']; ?></td>
                                    <td><a target="_BLANK" href="<?= $item['link']; ?>">Ir a la página</a></td>
                                    <td><button name="bt_delete" value="<?= $item["id"]?>" class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    
    
    
    
    
    
    
    <?php }else { ?>
        <div class="card-panel" style="width:400px; margin:0 auto; margin-top:20px; border-radius:10px; font-family:'Raleway', sans-serif;">
            <h4 class="center" style="color:#ef5350;">Error de acceso</h4>
            <p class="center">Debes iniciar sesión para poder ver esta página!</p>
            <p class="center">
                <a href="../index.php"><i class="material-icons" style="font-size: 40px;">home</i></a>
            </p>
            
        </div>
    <?php } ?>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>