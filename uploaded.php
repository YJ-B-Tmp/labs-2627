<?php

$upload_directory = getcwd() . '/uploads/';
$relative_path = '/uploads/';

// Handle Text File
$uploaded_text_file = $upload_directory . basename($_FILES['text_file']['name']);
$temporary_file = $_FILES['text_file']['tmp_name'];

if (move_uploaded_file($temporary_file, $uploaded_text_file)) {
    $text_file_content = file_get_contents($uploaded_text_file, 'r');
    ?>
    <textarea cols="70" rows="30"><?php echo $text_file_content; ?></textarea>
    <?php
} else {
    echo 'Failed to upload file';
}

// pls add any image file it should work this tiem
if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {
    $uploaded_image_file = $upload_directory . basename($_FILES['image_file']['name']);
    $temporary_image = $_FILES['image_file']['tmp_name'];

    if (move_uploaded_file($temporary_image, $uploaded_image_file)) {
        $image_relative_path = $relative_path . basename($_FILES['image_file']['name']);
        ?>
        <img src="<?php echo $image_relative_path; ?>" alt="Uploaded image" width="400">
        <?php
    } else {
        echo 'Failed to upload image file';
    }
}

echo '<pre>';
var_dump($_FILES);
exit;