<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('imgs/login.gif');
            background-size: cover;
        }

        .header {
            text-align: center;
            color: white;
            margin: 60px 0;
            font-family: 'Press Start 2P', cursive;
            text-shadow: 4px 4px 6px rgba(0, 0, 0, 0.9);
        }

        .login-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px 40px;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #a669db;
        }

        h2 {
            margin-bottom: 40px;
            color: white;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
        }

        .btn-custom {
            margin-top: 10px;
            background-color: #a669db;
            color: white;
        }

        .btn-custom:hover {
            background-color: #8e44ad;
        }

        a {
            color: #8e44ad;
        }

        a:hover {
            color: #a669db;
        }

        .alert {
            text-align: center;
            color: white;
            background-color: #ff6666; 
            border-color: #ff3333; 
        }
        
        .form-group, .form-check, .mt-3 {
            color: white;
        }

        input.form-control {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.5);
            transition: background-color 0.3s, border-color 0.3s;
        }

        input.form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        input.form-control:focus {
            background-color: rgba(255, 255, 255, 0.3);
            border-color: #a669db;
            outline: none;
            color: white;
        }

        input.form-control:focus::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        input::selection {
            background-color: #a669db;
            color: white;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            z-index: 2000;
            display: none;
        }

        .input-group {
            position: relative;
        }

        .input-group input:focus + .toggle-password,
        .input-group .toggle-password:hover {
            display: block;
        }

        hr {
            border: none;            
            height: 1px;             
            background-color: #a669db; 
            width: 100%;             
            margin: 20px auto;    
        }
    </style>
</head>
<body>
    <header class="header">
        <h1>PlayCentral</h1>
        <p>Your gateway to gaming</p>
    </header>
    <div class="login-container">
        <h2 class="text-center">Login</h2>
        <?php if (isset($error)): ?>
            <div id="alert" class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <hr>
        <form action="<?= site_url('login') ?>" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" required placeholder="" value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" name="password" id="password" required placeholder="" value="<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : ''; ?>">
                    <img id="toggle-icon" class="toggle-password" onclick="togglePassword()" src="https://img.icons8.com/ios-filled/20/ffffff/invisible.png" alt="Toggle Password"/>
                </div>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="remember" id="remember" <?php echo isset($_COOKIE['username']) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="remember">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-custom btn-block">Login</button>
            <p class="mt-3 text-center">Don't have an account? <a href="<?php echo base_url('registration'); ?>">Register here</a></p>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
