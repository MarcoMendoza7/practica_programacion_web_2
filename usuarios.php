<?php
include 'config/conexion.php';
$query = "SELECT * FROM usuarios";
$res = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Usuarios Registrados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <header class="d-flex justify-content-between mb-4">
            <h1>Lista de Usuarios</h1>
            <a href="index.php" class="btn btn-danger">Salir</a>
        </header>
        
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($res)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['fecha_registro']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>