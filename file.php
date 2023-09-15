<?php
// Check if a file was uploaded
if (isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // Check if the file size is greater than 2 MB (2 * 1024 * 1024 bytes)
    if ($file['size'] >= 2 * 1024 * 1024) {
        // File size is within the limit, proceed with the upload
        $uploadDir = 'uploads/'; // Set your upload directory path here
        $uploadPath = $uploadDir . $file['name'];

        echo "exceeed";
    } else {
         $uploadDir = 'uploads/'; // Set your upload directory path here
        $uploadPath = $uploadDir . $file['name'];
        if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
        //     echo 'File uploaded successfully!';
        // File size exceeds the limit
        echo 'uploaded';
    }
    else{
        echo"file exceded ";
    }
}}
?>

<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" value="Upload">
    </form>
</body>
</html>
