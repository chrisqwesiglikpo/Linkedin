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
    <link rel="shortcut icon" href="<?php echo url_for('frontend/assets/favicon/linkedIn.ico'); ?>">
    <link rel="stylesheet" href="<?php echo url_for('frontend/assets/css/main.css'); ?>">
</head>