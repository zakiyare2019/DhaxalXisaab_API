<?php
$target_dir = "IMAGES/";
$base64Image = $_POST["image"];
$imageData = base64_decode($base64Image);

$filename = uniqid() . '.jpg'; // Generate a unique filename
$target_file = $target_dir . $filename;

if (file_put_contents($target_file, $imageData)) {
    echo "The file " . $filename . " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}
?>
