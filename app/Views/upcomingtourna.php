<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Tournaments</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            color: #333;
            background-image: url('imgs/index-bg.jpg');
            background-size: cover;
            background-position: center;   
            background-attachment: fixed; 
        }

        #upcoming-tournaments {
            padding: 40px 20px; 
        }

        .tournament-container {
            display: flex;
            flex-direction: column;
            background-color: rgba(0, 0, 0, 0.5); 
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .tournament-image {
            width: 100%;
            height: 500px;
            background-size: cover;
            background-position: center;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .tournament-info {
            flex-grow: 1;
        }

        .tournament-info h3 {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 24px;
        }

        .tournament-date p {
            margin: 0;
            font-weight: bold;
            font-size: 18px;
        }

        h1, h2, p {
          color: white;
          text-align: center;
          font-family: 'Press Start 2P', cursive;
          text-shadow: 4px 4px 6px rgba(0, 0, 0, 0.9);
        }

        h2 {
            color: #a669db;
        }
        .nav-item {
            margin: 0 15px;
        }

        .navbar-nav .nav-link {
            font-family: 'Press Start 2P', cursive;
            font-size: 14px; 
        }

        .navbar-nav .nav-link.active {
            color: #a669db !important;
        }

        p {
            text-shadow: none;
        }

        .subheading {
            font-family: Arial, sans-serif;
            text-shadow: 4px 4px 6px rgba(0, 0, 0, 0.9);
            font-size: 1.25rem; 
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="<?= site_url('/') ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= site_url('admin_tournareg') ?>">Tournament Registration</a></li>
                <li class="nav-item"><a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Registered Players</a></li>
                <li class="nav-item"><a class="nav-link active" href="<?= site_url('upcomingtourna') ?>">Upcoming Tournaments</a></li>
            </ul>
        </div>
    </nav>

    <section id="upcoming-tournaments">
        <h1>Check Out Future Competitions!</h1><br>
        <p class="subheading">Stay ahead and never miss an exciting event. Check out what's next!</p><br>
        
        <div class="tournament-container">
          <div class="tournament-info">
            <h2>Overwatch 2</h2>
          </div>
        <div class="tournament-date">
            <p>Dec 2-4, 2024</p><br>
            <div class="tournament-image" style="background-image: url('imgs/overwatch2-upcoming.png');"></div>
          </div>
        </div>

        <div class="tournament-container">
          <div class="tournament-info">
            <h2>Apex Legends</h2>
          </div>
        <div class="tournament-date">
            <p>Dec 9-12, 2024</p><br>
            <div class="tournament-image" style="background-image: url('imgs/apexlegends-upcoming.jpg');"></div>
          </div>
        </div>
      
        <div class="tournament-container">
          <div class="tournament-info">
            <h2>Dota 2</h2>
          </div>
        <div class="tournament-date">
            <p>Dec 16-19, 2024</p><br>
            <div class="tournament-image" style="background-image: url('imgs/dota2-upcoming.png');"></div>
          </div>
        </div>  
    </section>

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; <?= date('Y') ?> PlayCentral. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
