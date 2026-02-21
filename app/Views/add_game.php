<?php if (session()->getFlashdata('validation')): ?>
    <div class="alert alert-danger">
        <?php foreach (session()->getFlashdata('validation') as $error): ?>
            <p><?= esc($error) ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Game</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
            body {
            background: url('<?= base_url('imgs/addgame.gif')?>');
            background-size: cover;
            background-attachment: fixed; 
            color: white;
            font-family: 'Press Start 2P', cursive;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #a669db;
        }

        .btn-custom {
            background-color: #a669db;
            color: white;
        }

        .btn-custom:hover {
            background-color: #8e44ad;
        }

        input.form-control, textarea.form-control {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        input.form-control:focus, textarea.form-control:focus {
            background-color: rgba(255, 255, 255, 0.3);
            border-color: #a669db;
            outline: none;
            color: white;
        }

        input::placeholder, textarea::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .preview-image-container {
            display: block;
            width: 100%;
            height: 200px;
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            margin-top: 10px;
            text-align: center;
            position: relative;
        }

        .preview-image {
            display: none;
            max-width: 100%;
            max-height: 100%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .file-input {
            display: none;
        }

        .file-label {
            display: inline-block;
            padding: 10px;
            background-color: #a669db;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            text-align: center;
        }

        .file-label:hover {
            background-color: #8e44ad;
        }

        .file-message {
            margin-top: 10px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 5px;
            padding: 5px;
        }
    </style>
    <script>
        function previewImage(event) {
            const preview = document.getElementById('imagePreview');
            preview.src = URL.createObjectURL(event.target.files[0]);
            preview.style.display = 'block';

            const fileMessage = document.querySelector('.file-message');
            fileMessage.textContent = event.target.files[0].name;
        }
    </script>
</head>
<body>

<div class="container">
    <h2>Add a Game for Tournament</h2>
    <form action="<?= base_url('add_game') ?>" method="post" enctype="multipart/form-data">
        
    <div class="form-group">
        <label for="name">Game Name:</label>
        <input type="text" name="name" class="form-control" required value="<?= old('name') ?>">
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" class="form-control" required><?= old('description') ?></textarea>
    </div>
    <div class="form-group">
        <input type="file" name="image" id="image" class="file-input" accept="image/*" onchange="previewImage(event)">
        <label for="image" class="file-label">Choose Image</label>
        <div class="file-message">No file chosen</div>
        <div class="preview-image-container">
            <img id="imagePreview" class="preview-image" src="" alt="Image Preview">
        </div>
    </div>
    <button type="submit" class="btn btn-custom btn-block">Upload Game</button>
    <a href="<?= site_url('admin_tournareg') ?>" class="btn btn-secondary btn-block">Back</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
