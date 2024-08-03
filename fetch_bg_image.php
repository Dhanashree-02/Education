<?php
// Define the directory
$bgImgDir = 'Bg_Img/';

// Fetch all files in the directory
$files = scandir($bgImgDir);

// Filter out the directories '.' and '..'
$images = array_diff($files, array('.', '..'));

// Sort files to get the latest uploaded image
$images = array_values($images);
$latestImage = end($images);
?>