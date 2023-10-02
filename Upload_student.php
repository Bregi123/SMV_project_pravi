<
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-Learning File Upload and Download</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>E-Learning File Upload and Download</h2>

       

        <!-- List of Downloadable Files -->
        <h3>Available Files for Download:</h3>
        <ul>
            <?php
            $files = scandir('downloads/');
            foreach ($files as $file) {
                if ($file !== '.' && $file !== '..') {
                    echo '<li>';
                    echo '<a href="downloads/' . $file . '" download>' . $file . '</a>';
                    echo ' | <a href="?delete=' . urlencode($file) . '">Delete</a>';
                    echo '</li>';
                }
            }
            ?>

            <?php
            // Handle file deletion
            if (isset($_GET['delete'])) {
                $fileToDelete = $_GET['delete'];
                $filePathToDelete = 'downloads/' . $fileToDelete;
                
                if (file_exists($filePathToDelete) && unlink($filePathToDelete)) {
                    echo '<div class="alert alert-success">File deleted successfully.</div>';
                } 
            }
            ?>
        </ul>
    </div>
    <div class="container">
        <h2>E-Learning File Upload and Download</h2>

        <!-- File Upload Form -->
        <form action="#" method="post" enctype="multipart/form-data" class="mb-4">
            <div class="form-group">
                <label for="file">Choose a File:</label>
                <input type="file" name="file" id="file" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>

        <!-- PHP Code for File Upload -->
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
            $uploadsDirectory = 'downloads/';

            // Create the 'downloads' directory if it doesn't exist
            if (!file_exists($uploadsDirectory)) {
                mkdir($uploadsDirectory, 0755, true);
            }

            $targetFile = $uploadsDirectory . basename($_FILES['file']['name']);

            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
                echo '<div class="alert alert-success">File uploaded successfully.</div>';
            } else {
                echo '<div class="alert alert-danger">Error uploading file.</div>';
            }
        }
        ?>

        <!-- List of Downloadable Files -->
        <h3>Available Files for Download:</h3>
        <ul>
            <?php
            $files = scandir('downloads/');
            foreach ($files as $file) {
                if ($file !== '.' && $file !== '..') {
                    echo '<li>';
                    echo '<a href="downloads/' . $file . '" download>' . $file . '</a>';
                    echo ' | <a href="?delete=' . urlencode($file) . '">Delete</a>';
                    echo '</li>';
                }
            }
            ?>

            <?php
            // Handle file deletion
            if (isset($_GET['delete'])) {
                $fileToDelete = $_GET['delete'];
                $filePathToDelete = 'downloads/' . $fileToDelete;
                
                if (file_exists($filePathToDelete) && unlink($filePathToDelete)) {
                    echo '<div class="alert alert-success">File deleted successfully.</div>';
                } 
            }
            ?>
        </ul>
    </div>
</body>
</html>