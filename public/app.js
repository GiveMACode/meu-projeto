$(document).ready(function() {
    $('#login').on('submit', function(e) {
        e.preventDefault();
        const username = $('#username').val();
        const password = $('#password').val();

        $.ajax({
            url: '/auth/login',
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
            error: function() {
                alert('Login failed');
            }
        });
    });

    $('#add-contact').on('submit', function(e) {
        e.preventDefault();
        const name = $('#name').val();
        const email = $('#email').val();
        const token = localStorage.getItem('token');

        $.ajax({
            url: '/contacts',
            type: 'POST',
            headers: { 'Authorization': 'Bearer ' + token },
            contentType: 'application/json',
            data: JSON.stringify({ name, email }),
            success: function() {
                loadContacts();
            },
            error: function() {
                alert('Failed to add contact');
            }
        });
    });

    function loadContacts() {
        const token = localStorage.getItem('token');

        $.ajax({
            url: '/contacts',
            type: 'GET',
            headers: { 'Authorization': 'Bearer ' + token },
            success: function(response) {
                $('#contacts').empty();
                response.forEach(contact => {
                    $('#contacts').append(`<li>${contact.name} (${contact.email})</li>`);
                });
            },
            error: function() {
                alert('Failed to load contacts');
            }
        });
    }
});
