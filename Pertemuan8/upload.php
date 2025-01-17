<?php

    $targetdir = "uploads/"; 
    $targetfile = $targetdir . basename($_FILES["file"]["name"]);
    $filetype = strtolower(pathinfo($targetfile, PATHINFO_EXTENSION));

    $allowedExtensions = array("txt","pdf","doc","docx");
    $maxsize = 5*1024*1024;

    if (in_array($filetype, $allowedExtensions) && $_FILES["file"]["size"]<=$maxsize) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetfile)) {
            echo "File berhasil diunggah.";
        } else {
            echo "Gagal mengunggah file.";
        }
    } else {
        echo "File tidak valid atau melebihi ukuran maksimum yang diizinkan";
    }

?>
