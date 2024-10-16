
var isAdmin = false;
if (isAdmin) {
   var topLinksTag = document.getElementsByClassName("top-links")[0];
   var adminPanelTag = document.createElement('a');
   adminPanelTag.setAttribute('href', 'ADMIN_URL');
   adminPanelTag.innerText = 'Admin panel';
   topLinksTag.append(adminPanelTag);
   var pTag = document.createElement('p');
   pTag.innerText = '|';
   topLinksTag.appendChild(pTag);
}
async function login() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Fetching user data from JSON file
    const response = await fetch('users.json');
    const users = await response.json();

    const user = users.find(u => u.username === username && u.password === password);

    const messageElement = document.getElementById('message');
    if (user) {
        messageElement.textContent = 'Connexion réussie!';
        messageElement.style.color = 'green';
    } else {
        messageElement.textContent = 'Nom d\'utilisateur ou mot de passe incorrect.';
        messageElement.style.color = 'red';
    }
}