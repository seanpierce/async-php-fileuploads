<?php
$dir = "uploads/";
$file = $_FILES["fileToUpload"];
$path = $dir . basename($file["name"]);
$error = false;
$type = strtolower(pathinfo($path,PATHINFO_EXTENSION));
$response;

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $error = false;
    } else {
        $response->errors[] = "File is not an image.";
        $error = true;
    }
}

// Check if file already exists
if (file_exists($path)) {
    $response->errors[] = "Sorry, file already exists..";
    $error = true;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $response->errors[] = "Sorry, your file is too large.";
    $error = true;
}

// Allow certain file formats
if ($type != "jpg" && $type != "png" && $type != "jpeg" && $type != "gif" ) {
    $response->errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $error = true;
}

// Check if $error is true
if ($error) {
    http_response_code(400);
    echo json_encode($response);
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $path)) {
        $response->message = "Success";
        echo json_encode($response);
    } else {
        $response->error[] = "Something went wrong. File was not uploaded.";
        echo json_encode($response);
        http_response_code(400);
    }
}
?>