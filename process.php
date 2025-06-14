<?php
session_start();

$errors = [];

$name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
$email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
$phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING));
$captcha = trim(filter_input(INPUT_POST, 'captcha', FILTER_SANITIZE_STRING));


// Validar name
if (!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/u', $name)) {
    $errors[] = "El nombre solo debe contener letras y espacios.";
}

// Validar email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Formato de email inválido.";
}

// Validar teléfono 
if (!preg_match('/^\d{3}-\d{3}-\d{4}$/', $phone)) {
    $errors[] = "Formato de teléfono inválido. Usa 123-456-7890.";
}

// Validar Captcha
if (!isset($_SESSION['captcha_code']) || $captcha !== $_SESSION['captcha_code']) {
    $errors[] = "Codigo captcha incorrecto.";
}

if (!empty($errors)) {
    echo implode("<br>", $errors);
} else {
    echo "<span class='success'>Formulario enviado correctamente.</span>";
}
?>