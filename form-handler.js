const form = document.getElementById('contactForm');

form.addEventListener('submit', function(event) {
    event.preventDefault();

    const name = form.name.value.trim();
    const email = form.email.value.trim();
    const phone = form.phone.value.trim();
    const captcha = form.captcha.value.trim();
    const errorDiv = document.getElementById('errors');
    errorDiv.innerHTML = '';
    errorDiv.className = ''; 

    let errors = [];
    const nameRegex = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phoneRegex = /^\d{3}-\d{3}-\d{4}$/;

    if (!nameRegex.test(name)) {
        errors.push("El nombre solo debe contener letras y espacios.");
    }

    if (!emailRegex.test(email)) {
        errors.push("Formato de email inválido.");
    }

    if (!phoneRegex.test(phone)) {
        errors.push("Formato de teléfono inválido. Usa 123-456-7890.");
    }

    if (captcha === '') {
        errors.push("El CAPTCHA es obligatorio.");
    }

    if (errors.length > 0) {
        errorDiv.classList.add("error-message");
        errorDiv.innerHTML = errors.join("<br>");
        return;
    }

    const formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        if (data.includes("Formulario enviado correctamente")) {
            errorDiv.classList.add("success-message");
        } else {
            errorDiv.classList.add("error-message");
        }
        errorDiv.innerHTML = data;
    })
    .catch(error => {
        errorDiv.classList.add("error-message");
        errorDiv.innerHTML = "Ocurrió un error inesperado.";
        console.error('Error:', error);
    });
});