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

if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] === UPLOAD_ERR_OK) {
    $uploaded_pdf_file = $upload_directory . basename($_FILES['pdf_file']['name']);
    $temporary_pdf = $_FILES['pdf_file']['tmp_name'];

    if (move_uploaded_file($temporary_pdf, $uploaded_pdf_file)) {
        $pdf_relative_path = $relative_path . basename($_FILES['pdf_file']['name']);
        ?>
        <embed src="<?php echo $pdf_relative_path; ?>" type="application/pdf" width="600" height="500">
        <?php
    } else {
        echo 'Failed to upload PDF file';
    }
}

// mp3
if (isset($_FILES['audio_file']) && $_FILES['audio_file']['error'] === UPLOAD_ERR_OK) {
    $uploaded_audio_file = $upload_directory . basename($_FILES['audio_file']['name']);
    $temporary_audio = $_FILES['audio_file']['tmp_name'];

    if (move_uploaded_file($temporary_audio, $uploaded_audio_file)) {
        $audio_relative_path = $relative_path . basename($_FILES['audio_file']['name']);
        ?>
        <audio controls>
            <source src="<?php echo $audio_relative_path; ?>" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
        <?php
    } else {
        echo 'Failed to upload audio file';
    }
}

echo '<pre>';
var_dump($_FILES);
exit;