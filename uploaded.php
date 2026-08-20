<?php

$upload_directory = getcwd() . '/uploads/';
$relative_path = '/uploads/';

//folder checker
if (!is_dir($upload_directory)) {
    mkdir($upload_directory, 0755, true);
}

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

// mp4s
if (isset($_FILES['video_file']) && $_FILES['video_file']['error'] === UPLOAD_ERR_OK) {
    $uploaded_video_file = $upload_directory . basename($_FILES['video_file']['name']);
    $temporary_video = $_FILES['video_file']['tmp_name'];

    if (move_uploaded_file($temporary_video, $uploaded_video_file)) {
        $video_relative_path = $relative_path . basename($_FILES['video_file']['name']);
        ?>
        <video width="500" controls>
            <source src="<?php echo $video_relative_path; ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <?php
    } else {
        echo 'Failed to upload video file';
    }
}

echo '<pre>';
var_dump($_FILES);
exit;