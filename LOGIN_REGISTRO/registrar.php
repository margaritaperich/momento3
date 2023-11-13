<?php
// Conectar a la base de datos (cambia las credenciales según tu configuración)
$conexion = new mysqli("localhost", "root", "", "myp2");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Recibir datos del formulario de registro
$nombre_usuario = $_POST["nombre_usuario"];
$contraseña = password_hash($_POST["contraseña"], PASSWORD_BCRYPT);

// Insertar datos en la base de datos
$insertar = "INSERT INTO usuarios (nombre_usuario, contraseña) VALUES ('$nombre_usuario', '$contraseña')";
if ($conexion->query($insertar) === TRUE) {
    echo "Registro exitoso.";
} else {
    echo "Error: " . $insertar . "<br>" . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
