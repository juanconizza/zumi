<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $asunto = $_POST['subject'];
    $mensaje = $_POST['message'];

    // Dirección de correo electrónico donde quieres recibir los mensajes
    $destinatario = "contact@zumitech.us";

    // Cabeceras del correo electrónico
    $cabeceras = "From: $email" . "\r\n" .
                 "Reply-To: $email" . "\r\n" .
                 "X-Mailer: PHP/" . phpversion();

    // Enviar el correo electrónico
    if (mail($destinatario, $asunto, $mensaje, $cabeceras)) {
        echo "Thank you! will be in contact soon.";
    } else {
        echo "Error!, try again.";
    }
} else {
    // Si se accede directamente a este script, redirigir a la página del formulario
    header("Location: contacto.html");
    exit;
}
?>
