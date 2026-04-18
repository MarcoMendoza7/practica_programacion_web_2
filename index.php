<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Practica Web U2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h4 class="mb-0">Iniciar Sesión</h4>
                    </div>
                    <div class="card-body p-4">
                        <?php if(isset($_GET['error'])): ?>
                            <div class="alert alert-danger p-2 text-center small">
                                Datos incorrectos. Verifica ID, Nombre, Correo y Pass.
                            </div>
                        <?php endif; ?>

                        <form action="login_proceso.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label small fw-bold">ID de Usuario</label>
                                <input type="number" name="id_usuario" class="form-control" placeholder="Ej: 1" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Nombre Completo</label>
                                <input type="text" name="nombre" class="form-control" placeholder="Como aparece en BD" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Correo Electrónico</label>
                                <input type="email" name="email" class="form-control" placeholder="tu@correo.com" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Contraseña</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-2">Entrar al Sistema</button>
                        </form>
                    </div>
                    <div class="card-footer text-center bg-white">
                        <p class="mb-0 small">¿No tienes cuenta? <a href="registro.php" class="text-decoration-none">Regístrate aquí</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>