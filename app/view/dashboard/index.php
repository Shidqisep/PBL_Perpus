<?php Flasher::Flash() ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="/css/output.css" rel="stylesheet">
</head>
<body>
    <h1>Halo, <?= $data['username']?></h1>
    <a href="/Auth/handleLogout">Logout</a>
</body>
</html>