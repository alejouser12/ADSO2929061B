<?php
$tittle = "28 - Upload Files";
$description = "Learn how to upload files in PHP."; 

include 'template/header.php';
echo '<section>';

echo '<h2>Upload Files</h2>';
echo '<form action="" method="post" enctype="multipart/form-data">';
echo '<input type="file" name="fileToUpload" id="fileToUpload">';
echo '<input type="submit" value="Upload File" name="submit">';
echo '</form>';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $target_dir = "uploads/"; 
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<p>The file <strong>" . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . "</strong> has been uploaded.</p>";
    } else {
        echo "<p style='color:red;'>Sorry, there was an error uploading your file.</p>";
    }
}

echo '</section>';

include 'template/footer.php';
?>
