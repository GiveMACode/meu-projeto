$(document).ready(function() {
    $('#login').on('submit', function(e) {
        e.preventDefault();
        const username = $('#username').val();
        const password = $('#password').val();

        $.ajax({
            url: '/auth/login', // Certifique-se de que esse endpoint está correto
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({ username, password }),
            success: function(response) {
                localStorage.setItem('token', response.token);
                $('#login-form').hide();
                $('#contact-form').show();
                $('#contacts-list').show();
                loadContacts();
            },
            error: function(xhr) {
                alert(`Login failed: ${xhr.responseText || 'Unknown error'}`);
            }
        });
    });

    $('#add-contact').on('submit', function(e) {
        e.preventDefault();
        const name = $('#name').val();
        const email = $('#email').val();
        const token = localStorage.getItem('token');

        $.ajax({
            url: '/contacts', // Certifique-se de que esse endpoint está correto
            type: 'POST',
            headers: { 'Authorization': 'Bearer ' + token },
            contentType: 'application/json',
            data: JSON.stringify({ name, email }),
            success: function() {
                loadContacts();
            },
            error: function(xhr) {
                alert(`Failed to add contact: ${xhr.responseText || 'Unknown error'}`);
            }
        });
    });

    function loadContacts() {
        const token = localStorage.getItem('token');

        $.ajax({
            url: '/contacts', // Certifique-se de que esse endpoint está correto
            type: 'GET',
            headers: { 'Authorization': 'Bearer ' + token },
            success: function(response) {
                $('#contacts').empty();
                response.forEach(contact => {
                    $('#contacts').append(`<li>${contact.name} (${contact.email})</li>`);
                });
            },
            error: function(xhr) {
                alert(`Failed to load contacts: ${xhr.responseText || 'Unknown error'}`);
            }
        });
    }
});
