<?php   
require_once 'connect.php';
require_once 'func.php';

function getPixels($slug , $database) {
    if(!empty($slug)) {


        $data = $database->prepare("SELECT * FROM sprites WHERE slug = :slug");
        $data->execute([
            'slug' => $slug
        ]);
        $sprites = $data->fetch(PDO::FETCH_ASSOC);
        $spritesImg = json_decode($sprites['images']);
        dump($spritesImg);


        foreach($spritesImg as $sprite){
            $imgConvert[] = imagecreatefrompng('./' . $sprite);
        }

        dump($imgConvert);

        $returnArray = [];
        foreach($imgConvert as $ic){
            $width = imagesx($ic);
            $height = imagesy($ic);
        
            $colorsImage = [];
            for($x = 0; $x < $height; $x++) {
                for($y = 0; $y < $width; $y++) {
                    $rgb = imagecolorat($ic, $y, $x);
                    $r = ($rgb >> 16) & 0xFF;
                    $g = ($rgb >> 8) & 0xFF;
                    $b = $rgb & 0xFF;
                // dump([$r, $g, $b]);
                    $colorsImage[$x][$y] = [$r, $g, $b];
                }
            }

            array_push($returnArray, $colorsImage);
            
        
        }
        dump($returnArray);
        $returnArray = json_encode($returnArray);
        dump($returnArray);

        $query = $database->prepare("INSERT INTO pixels(slug , pixel) VALUES(:slug , :pixel)");
        $query->execute([
            'slug' => $slug,
            'pixel' => $returnArray
        ]);

        return $returnArray;
    } else {
        return 'No data found';
    }
}

getPixels($_GET['slug'] , $database);
//dump(getPixels($_GET['slug'] , $database));