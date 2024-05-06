<?php
function uploadImage($targetDir = "", $file, $size = 5, $direct)
{
    $targetDir = "image/$targetDir/";
    $newName   = time() . $file['name'];

    $data = ['errors' => false, 'result' => null];

    $max_size = $size * 1024 * 1024;
    $types = ['image/jpg', 'image/png', 'image/jpeg'];

    if ($file['error'] === 0) {
        if ($file['size'] > $max_size) {
            $_SESSION['imgErr'] = "Image size is too large";
            header("Location:$direct.php");

            exit;
        }

        // check image extension
        if (in_array($file['type'], $types) === false) {
            $_SESSION['imgErr'] = "Image size is too large";
            header("Location:$direct.php");
            exit;
        }

        if (move_uploaded_file($file['tmp_name'], $targetDir . $newName) == true) {
            $data['errors'] = false;
            $data['result'] = $newName;
            return $data;
        }
    } else {
        $_SESSION['imgErr'] = "something went wrong";
        header("Location:$direct.php");
    }

    return $data;
}


function pp($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    exit;
}
