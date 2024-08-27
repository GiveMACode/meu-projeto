<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD com JWT</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>CRUD com JWT</h1>
        <div id="login-form">
            <h2>Login</h2>
            <form id="login">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
        <div id="contact-form" style="display:none;">
            <h2>Add Contact</h2>
            <form id="add-contact">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Contact</button>
            </form>
        </div>
        <div id="contacts-list" style="display:none;">
            <h2>Contacts</h2>
            <ul id="contacts"></ul>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="app.js"></script>
</body>
</html>

<?php

require_once '../vendor/autoload.php';
require_once '../routes/web.php';

