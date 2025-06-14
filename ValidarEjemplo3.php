<!DOCTYPE html>
<!-- ValidarEjemplo3.php -->

<html>
<head>
    <link rel="stylesheet" href="estilo.css">
    <title>Validaciones con Fetch</title>
</head>
<body>

<h2>Ejemplo de Validaciones</h2>

<div class="container">
    <form id="contactForm" action="process.php" method="post"> 
        Name: <input type="text" name="name" placeholder="Ilian Rodriguez" required><br><br>
        Email: <input type="email" name="email" placeholder="usuario@gmail.com" required><br><br>
        Phone Number: <input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" required><br><br>
        <img src="captcha.php" alt="CAPTCHA Image"><br>
        Captcha: <input type="text" name="captcha" placeholder="Ingresa el código" required><br><br>    
        <input type="submit" name="submit" value="Submit"><br><br>
        <div id="errors"></div>
    </form>
</div>

<script src="form-handler.js" defer></script>
</body>
</html>