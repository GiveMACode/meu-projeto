document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('login');
    const contactsList = document.getElementById('contacts');
    let token = '';

    if (loginForm) {
        loginForm.addEventListener('submit', function (event) {
            event.preventDefault();
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            axios.post('/auth/login', { username, password })
                .then(response => {
                    token = response.data.token;
                    window.location.href = '/contacts';
                })
                .catch(error => {
                    alert('Login failed');
                    console.error(error);
                });
        });
    }

    if (contactsList) {
        axios.get('/contacts', {
            headers: { Authorization: `Bearer ${token}` }
        })
            .then(response => {
                contactsList.innerHTML = '';
                response.data.forEach(contact => {
                    const li = document.createElement('li');
                    li.className = 'list-group-item';
                    li.textContent = `${contact.name} - ${contact.email}`;
                    contactsList.appendChild(li);
                });
            })
            .catch(error => {
                alert('Failed to fetch contacts');
                console.error(error);
            });
    }
});
