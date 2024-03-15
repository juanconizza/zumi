<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $asunto = $_POST['subject'];
    $mensaje_usuario = $_POST['message'];

    // Dirección de correo electrónico donde quieres recibir los mensajes
    $destinatario = "contact@zumitech.us";

    // Asunto del correo electrónico
    $asunto_correo = "Nuevo contacto de $nombre";

    // Contenido del mensaje
    $mensaje = "Nombre: $nombre\n";
    $mensaje .= "Correo electrónico: $email\n";
    $mensaje .= "Asunto: $asunto\n";
    $mensaje .= "Mensaje: $mensaje_usuario";

    // Cabeceras del correo electrónico
    $cabeceras = "From: contact@zumitech.us" . "\r\n" .
                 "Reply-To: $email" . "\r\n" .
                 "X-Mailer: PHP/" . phpversion();

    // Enviar el correo electrónico
    if (mail($destinatario, $asunto_correo, $mensaje, $cabeceras)) {
        echo "OK";
    } else {
        echo "An error occurred, please try again later.";
    }
} else {
    // Si se accede directamente a este script, redirigir a la página del formulario
    header("Location: contacto.html");
    exit;
}
?>
