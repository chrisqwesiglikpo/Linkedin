<?php

if(!isset($page_title)){
    $page_title="Feed | LinkedIn";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php echo url_for('frontend/assets/js/jquery-3.5.1.js'); ?>"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.9/cropper.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.9/cropper.min.js"></script>
    <link rel="shortcut icon" href="<?php echo url_for('frontend/assets/favicon/linkedIn.ico'); ?>">
    <link rel="stylesheet" href="<?php echo url_for('frontend/assets/css/main.css'); ?>">
    
</head>