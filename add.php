<?php
require_once 'connect.php';
require_once 'func.php';

if(isset($_POST['name'])) {
    dump($_FILES['images']);
    $slug = toSlug($_POST['name']);

    $dest = 'images/'.$slug;
    mkdir($dest);

    $dataImages = [];

    for($i = 0; $i < count($_FILES['images']['name']); $i++) {
        $imgName = toSlug($_FILES['images']['name'][$i]);
        move_uploaded_file($_FILES['images']['tmp_name'][$i], $dest.'/'.$imgName);
        array_push($dataImages, $dest.'/'.$imgName);
    }

    dump($dataImages);
    
    $data = [
        'name' => $_POST['name'],
        'slug' => $slug,
        'images' => json_encode($dataImages)
    ];

    $sendData = $database->prepare("INSERT INTO sprites (name, slug, images) VALUES (:name, :slug, :images)");
    $sendData->execute($data);

}