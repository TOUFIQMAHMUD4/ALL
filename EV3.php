<!-- filepath: c:\xampp\htdocs\PHP\class24(CRUD-1)\EV3.php -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file = $_FILES['file'];
    $allowedTypes = ['pdf', 'jpg', 'jpeg', 'png', 'doc', 'docx'];
    $imageTypes = ['jpg', 'jpeg', 'png']; // শুধুমাত্র ইমেজ ফাইলের ধরন
    $maxSize = 400 * 1024; // 400 KB

    $fileName = $file['name'];
    $fileSize = $file['size'];
    $fileTmp = $file['tmp_name'];
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (!in_array($fileExt, $allowedTypes)) {
        echo "Invalid file type. Only PDF, IMAGE, and DOCUMENT files are allowed.";
    } elseif ($fileSize > $maxSize) {
        echo "File size exceeds the 400 KB limit.";
    } else {
        $uploadDir = "uploads/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir);
        }
        $uploadPath = $uploadDir . basename($fileName);
        if (move_uploaded_file($fileTmp, $uploadPath)) {
            echo "File uploaded successfully!<br>";
            echo "File Name: <a href='$uploadPath' target='_blank'>" . htmlspecialchars($fileName) . "</a><br>";

            // যদি ফাইলটি একটি ইমেজ হয়, তাহলে তা দেখানো হবে
            if (in_array($fileExt, $imageTypes)) {
                echo "<img src='$uploadPath' alt='Uploaded Image' style='max-width: 300px; margin-top: 10px;'>";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <label>Select File:</label>
        <input type="file" name="file" required><br><br>
        <button type="submit">Upload</button>
    </form>
</body>
</html>