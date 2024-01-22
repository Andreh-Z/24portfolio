<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
        $name = strip_tags(trim($_POST["name"]));
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["message"]);

        if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($message)) {
            echo "<script>alert('Por favor, completa todos los campos y proporciona un email válido.'); window.history.back();</script>";
            exit;
        }

        $to = "maxi.zeballos97@gmail.com";
        $subject = "Email from Portfolio";
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Message:\n$message\n";
        $email_headers = "From: $name <$email>";

        if (mail($to, $subject, $email_content, $email_headers)) {
            echo "<script>alert('¡Gracias! Tu mensaje ha sido enviado.'); window.location.href='/';</script>";
        } else {
            echo "<script>alert('Oops! Algo salió mal y no pudimos enviar tu mensaje.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Error en la entrada del formulario.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Solicitud inválida.'); window.history.back();</script>";
}
?>
