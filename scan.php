<?php 
require_once 'connect.php';
require_once 'func.php';

if(isset($_GET['slug'])) {
    $slug = $_GET['slug'];

    $data = $database->prepare("SELECT * FROM sprites WHERE slug = :slug");
    $data->execute([
        'slug' => $slug
    ]);
    $sprites = $data->fetch(PDO::FETCH_ASSOC);
    $spritesImg = json_decode($sprites['images']);
    dump($spritesImg);

    $imgConvert = imagecreatefrompng($spritesImg[0]);

    $width = imagesx($imgConvert);
    $height = imagesy($imgConvert);
    dump([$width, $height]);

    $colorsImage = [];
    for($x = 0; $x < $height; $x++) {
        for($y = 0; $y < $width; $y++) {
            $rgb = imagecolorat($imgConvert, $y, $x);
            $r = ($rgb >> 16) & 0xFF;
            $g = ($rgb >> 8) & 0xFF;
            $b = $rgb & 0xFF;
           // dump([$r, $g, $b]);
            $colorsImage[$x][$y] = [$r, $g, $b];
        }
    }

    dump($colorsImage);
}
?>