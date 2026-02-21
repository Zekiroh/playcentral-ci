<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('<?php echo base_url('imgs/login.gif'); ?>');
            background-size: cover;
        }

        .header {
            text-align: center;
            color: white;
            margin: 60px 0;
            font-family: 'Press Start 2P', cursive;
            text-shadow: 4px 4px 6px rgba(0, 0, 0, 0.9);
        }

        .registration-container {
            max-width: 600px;
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
            margin-top: 30px;
            background-color: #a669db; 
            color: white;
        }

        .btn-custom:hover {
            background-color: #8e44ad; 
        }

        .alert {
            text-align: center;
            color: white;
            background-color: #ff6666; 
            border-color: #ff3333;
        }

        .alert-success {
            color: white;
            background-color: #28a745; 
            border-color: #218838; 
        }

        .form-group, .mt-3 {
            color: white;
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .form-group label {
            margin-right: 10px;
            flex: 0 0 150px;
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

        input::selection {
            background-color: #a669db;
            color: white;
        }

        a {
            color: #8e44ad; 
        }

        a:hover {
            color: #a669db; 
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
    <div class="registration-container">
        <h2 class="text-center">Register</h2>
        
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?php echo session()->getFlashdata('error'); ?>
            </div>
        <?php elseif (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?php echo session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('registration/register'); ?>" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" required value="<?= old('username'); ?>">
            </div>
            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="text" class="form-control" name="firstname" required value="<?= old('firstname'); ?>">
            </div>
            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" class="form-control" name="lastname" required value="<?= old('lastname'); ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" required value="<?= old('email'); ?>">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" class="form-control" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-custom btn-block">Register</button>
            <p class="mt-3 text-center">Already have an account? <a href="<?= site_url('login'); ?>">Login here</a></p>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
