// Função para alternar o icone de mostrar e ocultar senha
function togglePasswordVisibility() {
    const passwordField = document.getElementById('txtSenha');
    const togglePasswordIcon = document.getElementById('togglePasswordIcon');
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        togglePasswordIcon.classList.remove('bi-eye');
        togglePasswordIcon.classList.add('bi-eye-slash');
    } else {
        passwordField.type = 'password';
        togglePasswordIcon.classList.remove('bi-eye-slash');
        togglePasswordIcon.classList.add('bi-eye');
    }
}