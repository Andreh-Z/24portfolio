<?php
if(isset($_POST['submit'])){
    $to = "maxi.zeballos97@gmail.com";
    $name = $_POST['name'];
    $from = $_POST['email'];
    $message = $_POST['message'];
    $subject = "New message from website";
    $headers = "From: " . $from;

    $result = mail($to, $subject, $message, $headers);

    if ($result) {
        echo 'Your message has been sent successfully!';
    } else {
        echo 'Sorry, there was an error sending your message. Please try again later.';
    }
}
?>
