<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD com JWT</title> 
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
    <!-- Your custom CSS -->
    <link rel="stylesheet" href="styles.css">
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
                <button type="submit" class="btn btn-success">Login</button>
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

     <!-- Load jQuery first -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Load your JavaScript file -->
    <script src="app.js"></script>
    <!-- Load Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php

require_once '../vendor/autoload.php';
require_once '../routes/web.php';

