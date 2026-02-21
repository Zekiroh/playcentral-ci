<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournament Registration</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<style>
    html, body {
        height: 100%;
        margin: 0;
        overflow-x: hidden;
    }

    body {
        background-image: url('imgs/index-bg.jpg');
        display: flex;
        flex-direction: column;
        font-family: Arial, sans-serif;
        background-size: cover;
        background-position: center;
        color: white;
    }

    .navbar {
        justify-content: center;
    }

    .nav-item {
        margin: 0 15px;
    }

    .header {
        text-align: center;
        margin: 40px 0;
    }

    .search-bar {
        margin: 0px auto;
        width: 300px;
    }

    .search-input {
        background-color: rgba(255, 255, 255, 0.2); 
        color: white; 
        border: 1px solid rgba(255, 255, 255, 0.5); 
        border-radius: 8px; 
        height: 50px; 
        padding: 10px; 
        font-size: 1rem; 
    }

    .search-input:focus {
        background-color: rgba(255, 255, 255, 0.2); 
        border-color: #a669db; 
        outline: none; 
        color: white; 
    }

    .search-input::placeholder {
        color: white; 
        opacity: 0.7; 
    }

    footer {
        background-color: #343a40;
        color: white;
        text-align: center;
        padding: 1rem;
        width: 100%;
        position: relative;
        bottom: 0;
        margin-top: auto; 
        font-family: 'Press Start 2P';
    }

    .table-container {
        margin-top: 30px;
        background-color: rgba(0, 0, 0, 0.7);
        padding: 20px;
        border-radius: 8px;
    }

    .table thead th {
        text-align: center;
        border-bottom: 2px solid #8e44ad;
    }

    .table tbody td {
        text-align: center;
        border-bottom: 1px solid #8e44ad;
    }

    h1, h2 {
        font-family: 'Press Start 2P', sans-serif; 
        text-align: center; 
        text-shadow: 4px 4px 6px rgba(0, 0, 0, 0.9);
    }

    h1 {
        font-size: 2.5rem; 
    }

    h2 {
        font-size: 2rem;
    }

    p {
        font-size: 1.25rem; 
        margin-top: 20px;
        text-shadow: 4px 4px 6px rgba(0, 0, 0, 0.9);
    }

    @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

    .fade-in {
        animation: fadeIn 1s ease-in;
        color: #ADD8E6;
    }

    .btn-edit {
        background-color: #a669db;
        color: white;
    }

    .btn-edit:hover {
        background-color: #8e44ad;
        color: white;
    }

    .btn-delete {
        background-color: #dc3545;
        color: white;
    }

    .btn-delete:hover {
        background-color: #c82333;
    }

    .btn-primary {
        margin-left: 5px;
        background-color: #8e44ad;
        border-color: #8e44ad;
    }

    .btn-primary:hover {
        background-color: #a669db; 
        border-color: #a669db;
    }

    .btn-success {
        background-color: #1E90FF;
        border-color: #1E90FF;
        margin-top:20px;
    }

    .btn-success:hover {
        background-color: #1B86E1;
        border-color: #0f4c81;
    }

    .navbar-nav .nav-link {
        font-family: 'Press Start 2P', cursive;
        font-size: 14px; 
    }

    .navbar-nav .nav-link.active {
        color: #a669db !important;
    }
</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="<?= site_url('home') ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link active" href="<?= site_url('admin_tournareg') ?>">Tournament Registration</a></li>
                <li class="nav-item"><a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Registered Players</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= site_url('upcomingtourna') ?>">Upcoming Tournaments</a></li>
            </ul>
        </div>
    </nav>

    <header class="header">
        <h1 class="fade-in">Get Ready for the Tournament!</h1>
        <p>Choose your game and prepare to compete.</p>
    </header>

    <div class="search-bar mb-3">
        <form method="POST" action="<?= site_url('admin_tournareg') ?>" class="d-flex justify-content-center">
            <input type="text" name="search" class="form-control search-input" placeholder="Search for a game..." aria-label="Search" value="<?= htmlspecialchars($search_query); ?>">
            <button type="submit" class="btn btn-primary ms-2">Search</button>
        </form>
    </div>

    <main class="container my-5">
        <h2>Available Games</h2>
        <div class="text-center mb-3">
            <a href="<?= site_url('add_game') ?>" class="btn btn-success">Add Game</a>
        </div>

        <?php if (empty($games)): ?>
            <div class="text-center">
                <p>No games found.</p>
            </div>
        <?php else: ?>
            <div class="table-container">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($games as $game): ?>
                        <tr>
                            <td>
                                <?php if ($game['image']): ?>
                                    <img src="<?= base_url('uploads/' . $game['image']) ?>" alt="<?= $game['name'] ?>" width="150">
                                <?php else: ?>
                                    No Image
                                <?php endif; ?>
                            </td>
                            <td><?= esc($game['name']) ?></td>
                            <td><?= esc($game['description']) ?></td>
                            <td>
                                <a href="<?= site_url('edit_game/' . $game['id']) ?>" class="btn btn-edit">Edit</a>
                                <a href="<?= site_url('delete_game/' . $game['id']) ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this game?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        <?php endif; ?>
    </main>

    <footer>
        &copy; 2024 PlayCentral. All rights reserved.
    </footer>

</body>
</html>
