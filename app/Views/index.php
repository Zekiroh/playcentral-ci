<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayCentral - Gaming Tournament Registration Platform</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('imgs/index-bg.jpg');
            background-size: cover; 
            background-position: center;
            background-repeat: no-repeat; 
            overflow-x: hidden;
            background-attachment: fixed; 
        }

        header {
            background: url('images/hero.jpg') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 50px 0;
        }

        header h1 {
            font-size: 3rem;
        }

        header p {
            font-size: 1.25rem;
        }

        footer {
            bottom: 0;
            width: 100%;
            font-family: 'Press Start 2P';
        }

        .navbar {
            justify-content: center;
        }

        .navbar-nav {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .nav-item {
            margin: 0 15px;
        }

        .navbar-brand {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .btn-primary {
            background-color: #A669DB; 
            border-color: #A669DB;
        }

        .btn-primary:hover {
            background-color: #8e44ad;
            border-color: #8e44ad;
        }

        h4, p {
            color: white;
        }

        .jumbotron {
            background-color: rgba(0, 0, 0, 0.5); 
            position: relative;
            color: white;
        }

        .jumbotron h1,
        .jumbotron p,
        .jumbotron a {
            position: relative; 
            z-index: 1;
        }

        .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .logout-btn {
            margin-top: 15px;
        }

        .btn-margin {
            margin-right: 15px; 
        }

        .text-center {
            text-align: center; 
        }

        .welcome-text {
            font-family: 'Press Start 2P';
            color: white;
            margin: 25px auto;
            text-shadow: 4px 4px 6px rgba(0, 0, 0, 0.9);
            letter-spacing: 2px;
            line-height: 1.4;
        }

        .lead {
            text-shadow: 4px 4px 6px rgba(0, 0, 0, 0.9);
        }

        hr {
            border: none;            
            height: 1px;             
            background-color: white;
            width: 80%;             
            margin: 20px auto;    
        }

        .playcentral {
            font-family: 'Press Start 2P';
            letter-spacing: 2px;
            line-height: 1.4;
            color: #a669db; 
            text-shadow: 4px 4px 6px rgba(0, 0, 0, 0.9);
        }

        @keyframes typing {
            from { width: 0; }
            to { width: 100%; }
        }

        .typewriter {
            display: inline-block;
            overflow: hidden; 
            white-space: nowrap; 
            animation: typing 5s steps(30); 
            font-family: 'Press Start 2P';
            font-size: 3rem; 
            color: white; 
        }

        .typewriter::after {
            content: ''; 
            display: inline-block;
            width: 0; 
        }

        .current {
            font-family: 'Press Start 2P';
            text-shadow: 4px 4px 6px rgba(0, 0, 0, 0.9);
        }

        .navbar-nav .nav-link {
            font-family: 'Press Start 2P', cursive;
            font-size: 14px; 
        }

        .navbar-nav .nav-link.active {
            color: #a669db !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link active" href="<?= site_url('/') ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= site_url('admin_tournareg') ?>">Tournament Registration</a></li>
                <li class="nav-item"><a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Registered Players</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= site_url('upcomingtourna') ?>">Upcoming Tournaments</a></li>
            </ul>
        </div>
    </nav>

    <main class="container my-5">
        <div class="jumbotron text-center">
            <h1 class="display-4 welcome-text">
                Welcome to <span class="display-4 playcentral">PlayCentral</span>,<br> 
                <span class="typewriter"><?= $username; ?>!</span>
            </h1>

            <p class="lead">Your ultimate platform for gaming tournament registrations.</p>
            <p class="lead">Join, compete, and showcase your skills!</p><br><br><hr><br>
            <p class="lead">Secure your spot in the competition.</p>
            <a class="btn btn-primary btn-lg btn-margin" href="<?= site_url('admin_tournareg') ?>" role="button">Register Now</a>
            <a class="btn btn-secondary btn-lg btn-margin" href="<?= site_url('upcomingtourna') ?>" role="button">View Upcoming Tournaments</a>

            <form action="<?= site_url('logout') ?>" method="post" class="mt-3">
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-danger btn-lg logout-btn">Logout</button>
            </form>


        <section class="current-tournaments my-5" style="background-color: rgba(0, 0, 0, 0.5); padding: 20px;">
            <h1 class="text-center mb-4 text-white current">Current Tournaments</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="card border-0 rounded shadow" style="background-color: #A669DB;">
                        <img src="imgs/valorant.jpg" class="card-img-top rounded img-fluid" alt="Tournament 1">
                        <div class="card-body">
                            <h4 class="card-title text-center"><b>Valorant</b></h4><hr>
                            <p class="card-text text-center">Join our exciting Valorant tournament and showcase your skills!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 rounded shadow" style="background-color: #A669DB;">
                        <img src="imgs/leagueoflegends.jpg" class="card-img-top rounded img-fluid" alt="Tournament 2">
                        <div class="card-body">
                            <h4 class="card-title text-center"><b>League of Legends</b></h4><hr>
                            <p class="card-text text-center">Compete in League tournament for amazing prizes!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 rounded shadow" style="background-color: #A669DB;">
                        <img src="imgs/tekken8.jpg" class="card-img-top rounded img-fluid" alt="Tournament 3">
                        <div class="card-body">
                            <h4 class="card-title text-center"><b>Tekken 8</b></h4><hr>
                            <p class="card-text text-center">Sign up for Tekken 8 tournament and join the action!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 PlayCentral. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
