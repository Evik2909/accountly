<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="css/indexstyles.css">
    <link rel="icon" type="image/x-icon" href="img/icon.png">
    <title>Accountly - Login</title>
</head>

<body>
    <video class="bg-container" muted autoplay loop>
        <source src="video/bgvideo.mp4" type="video/mp4" />
    </video>
    <main class="login-container">
        <div class="login-header-container">
            <img src="img/icon.png" alt="">
            <h2>Accountly</h2>
        </div>
        <div class="form-container">
            <form class="login-form" action="logic/control.php" method="post">
            <h2>Inicio de Sesión</h2>
                <div class="form-group col-md-12">
                    <label for="cedula">N° Documento</label>
                    <input class="input-style" type="number" name="cedula" id="cedula">
                </div>
                <div class="form-group col-md-12">
                    <label for="contraseña">Contraseña</label>
                    <input class="input-style" type="password" name="contraseña" id="contraseña">
                </div>
                <div class="d-flex justify-content-center">
                <button class="login-btn" type="submit">Entrar</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>