<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <link href="/css/styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Contacts</h2>
        <ul id="contacts" class="list-group">
            <?php foreach ($contactList as $contact): ?>
                <li class="list-group-item">
                    <?php echo htmlspecialchars($contact['name']); ?> - <?php echo htmlspecialchars($contact['email']); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <script src="/js/app.js"></script>
</body>
</html>
