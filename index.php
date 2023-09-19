<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $upload_dir = 'uploads/';
    $original_name = $_FILES["fileToUpload"]["name"];
    $file_size = $_FILES["fileToUpload"]["size"]; // Get the file size in bytes

    // Check if the file size is less than or equal to 2MB (2 * 1024 * 1024 bytes)
    if ($file_size <= 2 * 1024 * 1024) {
        // Generate a unique ID using a timestamp
        $unique_id = time();

        // Create a new file name with the unique ID and "king" without the original extension
        $new_name = 'king' . $unique_id;

        // Extract the file extension
        $file_extension = pathinfo($original_name, PATHINFO_EXTENSION);

        // Combine the upload directory, new file name, and original extension
        $new_file_name = $new_name . '.' . $file_extension;
        $new_file_path = $upload_dir . $new_file_name;

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $new_file_path)) {
            echo "File successfully uploaded and renamed with a unique ID.";
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "File size exceeds the maximum limit of 2MB.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>File Upload and Rename</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <label for="fileToUpload">Choose a file (Max 2MB):</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload and Rename">
    </form>
</body>
</html>
