<?php

function getFiles() {
    $path = 'uploads/';
    $files = scandir($path);

    // removes dots from file list
    $files = array_diff(scandir($path), array('.', '..'));

    foreach ($files as $file) {
        echo "<a href='uploads/$file' target='_blank'>$file</a><br>";
    }
}

?>